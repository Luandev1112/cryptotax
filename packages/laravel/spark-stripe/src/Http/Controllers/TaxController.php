<?php

namespace Spark\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Spark\Contracts\Actions\CalculatesVatRate;
use Spark\Features;
use Spark\Spark;
use Stripe\TaxRate as StripeTaxRate;

class TaxController
{
    use RetrievesBillableModels;

    /**
     * Calculate the appropriate taxes for display.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $billable = $this->billable();

        $quantity = Spark::chargesPerSeat(request('billableType')) ? Spark::seatCount(request('billableType'), $billable) : 1;

        $subtotal = $request->total * $quantity;

        $anonymousBillable = $billable->newInstance()->forceFill([
            'billing_country' => $request->country,
            'billing_postal_code' => $request->postal_code,
            'vat_id' => $request->vat_number,
        ]);

        $taxRates = $anonymousBillable->taxRates();

        if (! $taxRates) {
            return response()->json([
                'tax' => 0,
                'total' => $this->formatAmount($subtotal, $request->currency),
            ]);
        }

        $exclusiveTaxAmount = 0;
        $totalTaxAmount = 0;

        foreach ($taxRates as $taxRatesId){
            $stripeTaxRate = StripeTaxRate::retrieve($taxRatesId, Cashier::stripeOptions());

            if (! $stripeTaxRate->inclusive) {
                $exclusiveTaxAmount += ceil($subtotal * ($stripeTaxRate->percentage / 100));
            }

            $totalTaxAmount += ceil($subtotal * ($stripeTaxRate->percentage / 100));
        }

        return response()->json([
            'tax' => $totalTaxAmount ? $this->formatAmount($totalTaxAmount, $request->currency) : null,
            'total' => $this->formatAmount($subtotal + $exclusiveTaxAmount, $request->currency)
        ]);
    }

    /**
     * Format the given amount.
     *
     * @param  float $amount
     * @param  string $currency
     * @return float|int|string
     */
    public function formatAmount($amount, $currency)
    {
        return Cashier::formatAmount($amount, $currency);
    }
}
