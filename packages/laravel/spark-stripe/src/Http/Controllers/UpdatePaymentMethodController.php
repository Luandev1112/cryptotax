<?php

namespace Spark\Http\Controllers;

use Illuminate\Http\Request;
use Spark\Contracts\Actions\UpdatesBillingMethod;
use Spark\Features;
use Spark\ValidCountry;
use Spark\ValidVatNumber;

class UpdatePaymentMethodController
{
    use RetrievesBillableModels;

    /**
     * Update the billing method for the billable entity.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        $billable = $this->billable();

        $this->validate($request);

        $this->updateBillable($request, $billable);

        $billable->subscription()->syncTaxRates();

        if ($request->payment_method) {
            app(UpdatesBillingMethod::class)->update(
                $billable,
                $request->payment_method
            );
        }
    }

    /**
     * Update the billable from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spark\Billable  $billable
     * @return void
     */
    private function updateBillable(Request $request, $billable)
    {
        $billable->forceFill($request->only([
            'extra_billing_information',
            'billing_address',
            'billing_address_line_2',
            'billing_city',
            'billing_state',
            'billing_postal_code',
            'billing_country',
            'vat_id',
        ]))->save();
    }

    /**
     * Validate the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    protected function validate(Request $request)
    {
        $countryRule = Features::collectsBillingAddress() ? 'required' : 'nullable';

        $request->validate([
            'billing_address' => ['nullable', 'max:225'],
            'billing_address_line_2' => ['nullable', 'max:225'],
            'billing_city' => ['nullable', 'max:225'],
            'billing_state' => ['nullable', 'max:225'],
            'billing_postal_code' => ['nullable', 'max:225'],
            'billing_country' => [$countryRule, 'max:2', new ValidCountry],
            'vat_id' => ['nullable', 'max:225', new ValidVatNumber],
        ]);
    }
}
