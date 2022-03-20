<?php

namespace Spark\Actions;

use Spark\Contracts\Actions\UpdatesBillingMethod;

class UpdateBillingMethod implements UpdatesBillingMethod
{
    /**
     * @inheritDoc
     */
    public function update($billable, $billingMethod)
    {
        if (! $billable->stripe_id) {
            $billable->createAsStripeCustomer();
        }

        $billable->updateDefaultPaymentMethod($billingMethod);

        try {
            $billable->paymentMethods()->reject(function ($paymentMethod) use ($billable) {
                return $paymentMethod->id == $billable->defaultPaymentMethod()->id;
            })->each(function ($paymentMethod) {
                $paymentMethod->delete();
            });
        } catch (\Throwable $e) {
            report($e);
        }
    }
}
