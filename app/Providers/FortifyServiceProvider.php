<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Add admin routes
        Route::prefix("admin")->as("admin.")->group(function () {
            $limiter = config('fortify.limiters.login');

            Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware(['guest:admin'])
                ->name('login');

            Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware(array_filter([
                    'guest:admin',
                    $limiter ? 'throttle:'.$limiter : null,
                ]));

            Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
        });

        if (request()->isAdmin()) {
            config([
                // Change guard and prefix
                'fortify.guard' => 'admin',
                'fortify.prefix' => 'admin',
                'fortify.home' => '/admin/dashboard',

                // Disable registration
                'fortify.features' => array_diff(config("fortify.features"), [
                    Features::registration()
                ])
            ]);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(request()->isAdmin()) {
            Fortify::loginView( 'admin.auth.login');
        }

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Login
        Fortify::authenticateUsing(function (Request $request) {
            /**
             * @var User $user
             */
            $user = User::where('email', $request->email)->first();

            // Not a user or wrong password
            if (!$user || !Hash::check($request->password, $user->password)) {
                return false;
            }

            // Login to admin
            if($request->isAdmin() && $user->isAdminPanelAccount()) {
                return $user;
            }
            // Login to customer panel
            if(!$request->isAdmin() && !$user->isAdminPanelAccount()) {
                return $user;
            }

            return null;
        });
    }
}
