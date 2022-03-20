<?php

namespace Spark\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Spark\Contracts\Actions\UpdatesSubscriptions;
use Spark\Spark;
use Spark\ValidPlan;

class UpdateSubscriptionController
{
    use RetrievesBillableModels;

    /**
     * Update the plan that the billable is currently subscribed to.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        $billable = $this->billable();

        $subscription = $billable->subscription('default');

        if (! $subscription) {
            throw ValidationException::withMessages([
                '*' => __('This account does not have an active subscription.')
            ]);
        }

        $request->validate([
            'plan' => ['required', new ValidPlan($request->billableType)]
        ]);

        Spark::ensurePlanEligibility(
            $billable,
            Spark::plans($billable->sparkConfiguration('type'))
                ->where('id', $request->plan)
                ->first()
        );

        app(UpdatesSubscriptions::class)->update($subscription, $request->plan);
    }
}
