<?php

namespace Spark\Contracts\Actions;

interface CreatesSubscriptions
{
    /**
     * Generate a checkout session for subscription.
     *
     * @param  \Spark\Billable  $billable
     * @param  string  $plan
     * @param  array  $options
     * @return mixed
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Laravel\Cashier\Exceptions\PaymentActionRequired
     */
    public function create($billable, $plan, array $options = []);
}
