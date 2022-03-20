<?php

namespace Spark\Actions;

use Illuminate\Validation\ValidationException;
use Spark\Contracts\Actions\UpdatesSubscriptions;
use Spark\Spark;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\CardException;
use Stripe\Invoice;

class UpdateSubscription implements UpdatesSubscriptions
{
    /**
     * @inheritDoc
     */
    public function update($subscription, $plan)
    {
        $subscription->errorIfPaymentFails();

        $this->payPendingPayments($subscription);

        $subscription->setProrationBehavior(Spark::prorationBehavior());

        try {
            $subscription->swap($plan);
        } catch (CardException $e) {
            throw ValidationException::withMessages([
                '*' => __('Your card was declined. Please contact your card issuer for more information.')
            ]);
        } catch (\Throwable $e) {
            report($e);

            throw ValidationException::withMessages([
                '*' => __('We are unable to process your payment. Please contact customer support.')
            ]);
        }
    }

    /**
     * Attempt to pay failed payments if any.
     *
     * @param  \Laravel\Cashier\Subscription  $subscription
     * @throws ValidationException
     */
    protected function payPendingPayments($subscription)
    {
        if (! $payment = $subscription->latestPayment()) {
            return;
        }

        $invoice = $subscription->latestInvoice();

        if (! $payment->isSucceeded() && $invoice->status === Invoice::STATUS_OPEN) {
            try {
                $invoice->asStripeInvoice()->pay();
            } catch (ApiErrorException $e) {
                throw ValidationException::withMessages([
                    '*' => __('Your card was declined. Please contact your card issuer for more information.')
                ]);
            }
        }
    }
}
