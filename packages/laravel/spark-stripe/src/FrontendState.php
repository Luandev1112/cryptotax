<?php

namespace Spark;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Stripe\Price;

class FrontendState
{
    /**
     * Get the data should be shared with the frontend.
     *
     * @param  string  $type
     * @param  \Illuminate\Database\Eloquent\Model  $billable
     * @return array
     */
    public function current($type, Model $billable)
    {
        $subscription = $billable->subscription('default');

        $plans = static::getPlans($type, $billable);

        $plan = $subscription && $subscription->active()
                    ? $plans->firstWhere('id', $subscription->stripe_plan)
                    : null;

        $homeCountry = is_string(config('spark.collects_eu_vat'))
                        ? config('spark.collects_eu_vat')
                        : Features::option('eu-vat-collection', 'home-country');

        return [
            'appLogo' => $this->logo(),
            'appName' => config('app.name', 'Laravel'),
            'billable' => $billable->toArray(),
            'billableId' => (string) $billable->id,
            'billableName' => $billable->name,
            'billableType' => $type,
            'brandColor' => $this->brandColor(),
            'cardBrand' => $billable->card_brand,
            'cardExpirationDate' => $billable->card_expiration,
            'cardLastFour' => $billable->card_last_four,
            'cashierPath' => config('cashier.path'),
            'collectsVat' => Features::collectsEuVat(),
            'collectsBillingAddress' => Features::collectsBillingAddress(),
            'countries' => Features::collectsEuVat() || Features::collectsBillingAddress() ? Countries::all() : [],
            'dashboardUrl' => $this->dashboardUrl(),
            'defaultInterval' => config('spark.billables.'.$type.'.default_interval', 'monthly'),
            'enforcesAcceptingTerms' => Features::enforcesAcceptingTerms(),
            'genericTrialEndsAt' => $billable->onGenericTrial() ? $billable->genericTrialEndsAt()->format('F j, Y') : null,
            'homeCountry' => $homeCountry,
            'monthlyPlans' => $plans->where('interval', 'monthly')->where('active', true)->values(),
            'paymentMethod' => $billable->card_last_four ? 'card' : null,
            'plan' => $plan,
            'receipts' => $this->receipts($billable),
            'seatName' => Spark::seatName($type),
            'sendsReceiptsToCustomAddresses' => Features::optionEnabled('receipt-emails-sending', 'custom-addresses'),
            'sparkPath' => config('spark.path'),
            'state' => $this->state($billable, $subscription),
            'stripeKey' => config('cashier.key'),
            'stripeVersion' => Cashier::STRIPE_VERSION,
            'termsUrl' => $this->termsUrl(),
            'trialEndsAt' => $subscription && $subscription->onTrial() ? $subscription->trial_ends_at->format('F j, Y') : null,
            'userAvatar' => Auth::user()->profile_photo_url,
            'userName' => Auth::user()->name,
            'yearlyPlans' => $plans->where('interval', 'yearly')->where('active', true)->values(),
        ];
    }

    /**
     * Get the logo that is configured for the billing portal.
     *
     * @return string|null
     */
    protected function logo()
    {
        $logo = config('spark.brand.logo');

        if (! empty($logo) && file_exists(realpath($logo))) {
            return file_get_contents(realpath($logo));
        }

        return $logo;
    }

    /**
     * Get the brand color for the application.
     *
     * @return string
     */
    protected function brandColor()
    {
        $color = config('spark.brand.color', 'bg-gray-800');

        return strpos($color, '#') === 0 ? 'bg-custom-hex' : $color;
    }

    /**
     * Get the subscription plans.
     *
     * @param  string  $type
     * @param  \Illuminate\Database\Eloquent\Model  $billable
     * @return \Illuminate\Support\Collection
     */
    protected function getPlans($type, $billable)
    {
        $plans = Spark::plans($type);

        $prices = collect(
            Price::all(['limit' => 100], Cashier::stripeOptions())->data
        );

        return $plans->map(function ($plan) use ($billable, $prices) {
            if (! $stripePrice = $prices->firstWhere('id', $plan->id)) {
                throw new \RuntimeException('Price ['.$plan->id.'] does not exist in your Stripe account.');
            }

            $plan->rawPrice = $stripePrice->unit_amount;

            $plan->price = Cashier::formatAmount($stripePrice->unit_amount, $stripePrice->currency);

            $plan->currency = $stripePrice->currency;

            return $plan;
        });
    }

    /**
     * Get the current subscription state.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $billable
     * @param  \Laravel\Cashier\Subscription  $subscription
     * @return string
     */
    protected function state(Model $billable, $subscription)
    {
        if ($subscription && $subscription->onGracePeriod()) {
            return 'onGracePeriod';
        }

        if ($subscription && $subscription->active()) {
            return 'active';
        }

        return 'none';
    }

    /**
     * List all receipts of the given billable.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $billable
     * @return array
     */
    protected function receipts(Model $billable)
    {
        return $billable->localReceipts
            ->map(function ($receipt) use ($billable) {
                $receipt->receipt_url = route('receipts.download', [
                    $billable->sparkConfiguration()['type'],
                    $billable->id,
                    $receipt->provider_id
                ]);

                return $receipt;
            })
            ->toArray();
    }

    /**
     * Get the URL of the billing dashboard.
     *
     * @return string
     */
    protected function dashboardUrl()
    {
        if ($dashboardUrl = config('spark.dashboard_url')) {
            return $dashboardUrl;
        }

        return app('router')->has('dashboard') ? route('dashboard') : '/';
    }

    /**
     * Get the URL of the "terms of service" page.
     *
     * @return string
     */
    protected function termsUrl()
    {
        if ($termsUrl = config('spark.terms_url')) {
            return $termsUrl;
        }

        return app('router')->has('terms.show') ? route('terms.show') : null;
    }
}
