<?php

namespace Spark\Contracts\Actions;

interface UpdatesBillingMethod
{
    /**
     * Update the billing method for the given billable.
     *
     * @param  \Spark\Billable  $billable
     * @param  string  $billingMethod
     * @return mixed
     */
    public function update($billable, $billingMethod);
}
