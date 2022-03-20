<?php

namespace Spark\Http\Controllers;

use Illuminate\Support\Facades\View;
use Inertia\Inertia;
use Spark\FrontendState;
use Spark\GuessesBillableTypes;
use Spark\Spark;

class BillingPortalController
{
    use GuessesBillableTypes, RetrievesBillableModels;

    /**
     * Show the billing portal.
     *
     * @param  string|null  $type
     * @param  mixed  $id
     * @return \Inertia\Response
     */
    public function __invoke($type = null, $id = null)
    {
        $type = $type ?: $this->guessBillableType();

        $billable = $this->billable($type, $id);

        Inertia::setRootView('spark::app');

        View::share([
            'cssPath' => __DIR__.'/../../../public/css/app.css',
            'jsPath' => __DIR__.'/../../../public/js/app.js',
            'translations' => static::getTranslations(),
        ]);

        Inertia::share(app(FrontendState::class)->current($type, $billable));

        return Inertia::render('BillingPortal', [
            'subscribingTo' => request('subscribe') ? $this->planToSubscribeTo($type) : null,
        ]);
    }

    /**
     * Get the Spark translations from the appropriate language file.
     *
     * @return string
     */
    private static function getTranslations()
    {
        if (! is_readable($file = resource_path('lang/spark/'.app()->getLocale().'.json'))) {
            $file = resource_path('lang/spark/'.app('translator')->getFallback().'.json');
        }

        return is_readable($file) ? file_get_contents($file) : '{}';
    }

    /**
     * Get the plan the user is subscribing to.
     *
     * @param  string  $type
     * @return \Spark\Plan $Plan
     */
    private function planToSubscribeTo($type)
    {
        return Spark::plans($type)->first(function ($plan) {
            return $plan->id == request('subscribe');
        });
    }
}
