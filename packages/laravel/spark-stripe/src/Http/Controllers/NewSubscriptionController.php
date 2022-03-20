<?php

namespace Spark\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\PaymentActionRequired;
use Spark\Billable;
use Spark\Contracts\Actions\CreatesSubscriptions;
use Spark\Contracts\Actions\UpdatesBillingMethod;
use Spark\Features;
use Spark\Spark;
use Spark\ValidCountry;
use Spark\ValidPlan;
use Spark\ValidVatNumber;

class NewSubscriptionController
{
    use RetrievesBillableModels;

    /**
     * Create a new subscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $billable = $this->billable();

        $this->validate($request);

        Spark::ensurePlanEligibility(
            $billable,
            Spark::plans($billable->sparkConfiguration('type'))
                ->where('id', $request->plan)
                ->first()
        );

        $this->updateBillable($request, $billable);

        if ($request->payment_method) {
            app(UpdatesBillingMethod::class)->update(
                $billable,
                $request->payment_method
            );
        }

        try {
            app(CreatesSubscriptions::class)->create(
                $billable,
                $request->plan,
                ['coupon' => $request->coupon]
            );
        } catch (PaymentActionRequired $e) {
            return response()->json([
                'paymentId' => $e->payment->id
            ]);
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
            'plan' => ['required', new ValidPlan($request->billableType)],
            'extra_billing_information' => 'max:2048',
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
