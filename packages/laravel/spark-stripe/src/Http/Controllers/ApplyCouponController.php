<?php

namespace Spark\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Stripe\Exception\InvalidRequestException;

class ApplyCouponController
{
    use RetrievesBillableModels;

    /**
     * Update the receipt emails for the given billable.
     *
     * @param  \Illuminate\Http\Request
     * @return void
     */
    public function __invoke(Request $request)
    {
        $billable = $this->billable();

        $subscription = $billable->subscription('default');

        try{
            $subscription->updateStripeSubscription([
                'coupon' => $request->coupon
            ]);
        } catch (InvalidRequestException $e) {
            if ($e->getStripeParam() == 'coupon') {
                throw ValidationException::withMessages([
                    '*' => __('The provided coupon code is invalid.')
                ]);
            }

            report($e);

            throw ValidationException::withMessages([
                '*' => __('An unexpected error occurred and we have notified our support team. Please try again later.')
            ]);
        }
    }
}
