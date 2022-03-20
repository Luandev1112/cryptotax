<?php

namespace App\Providers;

use App\Models\UserAccountType;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/dashboard';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Api routes
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            // Admin-Panel routes
            Route::middleware(['web', 'auth:admin', 'verified'])
                ->name("admin.")
                ->prefix("admin")
                ->group(base_path('routes/admin-routes.php'));

            // Customer-Panel routes
            Route::middleware(['web', 'auth:web', 'verified', 'user-account-type:customer'])
                ->name("customer.")
                ->group(base_path('routes/customer-routes.php'));

            // Affiliate routes
            Route::middleware(['web', 'auth:web', 'verified', 'user-account-type:affiliate'])
                ->name("affiliate.")
                ->group(base_path('routes/affiliate-routes.php'));

            // General web routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
