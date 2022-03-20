<?php

namespace Spark\Actions;

use Illuminate\Validation\ValidationException;
use Laravel\Cashier\Exceptions\PaymentActionRequired;
use Spark\Contracts\Actions\CreatesSubscriptions;
use Spark\Events\SubscriptionCreated;
use Spark\Spark;
use Stripe\Exception\InvalidRequestException;
use Stripe\Subscription;

class CreateSubscription implements CreatesSubscriptions
{
    /**
     * @inheritDoc
     */
    public function create($billable, $plan, array $options = [])
    {
        $type = $billable->sparkConfiguration('type');

        $planObject = Spark::plans($type)
            ->where('id', $plan)
            ->first();

        $this->purgeOldSubscriptions($billable);

        $builder = $billable->newSubscription('default', $plan);

        $this->configureTrial($billable, $planObject, $builder);

        if (isset($options['coupon'])) {
            $builder->withCoupon($options['coupon']);
        }

        if (Spark::chargesPerSeat($type)) {
            $builder->quantity(Spark::seatCount($type, $billable));
        }

        $subscription = $this->createSubscriptionViaStripe($builder);

        if ($subscription &&
            ($subscription->onTrial() || $subscription->active())) {
            event(new SubscriptionCreated($billable));

            $billable->update(['trial_ends_at' => null]);
        }
    }

    /**
     * Actually create the subscription via Stripe.
     *
     * @param  \Laravel\Cashier\SubscriptionBuilder  $builder
     * @return \Laravel\Cashier\Subscription
     */
    protected function createSubscriptionViaStripe($builder)
    {
        try {
            return $builder->create();
        } catch (InvalidRequestException $e) {
            if ($e->getStripeParam() == 'coupon') {
                throw ValidationException::withMessages([
                    '*' => __('The provided coupon code is invalid.')
                ]);
            }

            report($e);

            throw ValidationException::withMessages([
                '*' => __('We are unable to process your payment. Please contact customer support.')
            ]);
        } catch (PaymentActionRequired $e) {
            throw $e;
        } catch (\Throwable $e) {
            report($e);

            throw ValidationException::withMessages([
                '*' => __('We are unable to process your payment. Please contact customer support.')
            ]);
        }
    }

    /**
     * Cancel and delete any old subscriptions except ones that were already cancelled.
     *
     * @param  \Spark\Billable  $billable
     * @return void
     */
    protected function purgeOldSubscriptions($billable)
    {
        $billable->subscriptions()->where('stripe_status', '!=', Subscription::STATUS_CANCELED)
            ->each(function ($subscription) {
                try {
                    $status = $subscription->stripe_status;

                    $subscription->noProrate();

                    $subscription->cancelNow();

                    if (in_array($status, [
                        Subscription::STATUS_INCOMPLETE,
                        Subscription::STATUS_INCOMPLETE_EXPIRED
                    ])) {
                        $subscription->delete();
                    }
                } catch (\Throwable $e) {
                }
            });
    }

    /**
     * Configure the trial period.
     *
     * @param  \Spark\Billable  $billable
     * @param  \Spark\Plan $plan
     * @param  \Laravel\Cashier\SubscriptionBuilder  $builder
     * @return void
     */
    protected function configureTrial($billable, $plan, $builder)
    {
        $skipTrialIfSubscribedBefore = config('spark.skip_trial_if_subscribed_before');

        if (is_null($skipTrialIfSubscribedBefore) ||
            ! $subscription = $billable->subscription()) {
            $plan->trialDays ? $builder->trialDays($plan->trialDays) : null;

            return;
        }

        if (now()->diffInDays($subscription->ends_at) < $skipTrialIfSubscribedBefore) {
            $builder->skipTrial();

            return;
        }

        $plan->trialDays ? $builder->trialDays($plan->trialDays) : null;
    }
}
