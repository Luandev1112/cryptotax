<?php

namespace Spark;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;
use RuntimeException;
use Spark\Contracts\Actions\CalculatesVatRate;
use Spark\Contracts\Actions\CreatesSubscriptions;
use Spark\Contracts\Actions\UpdatesBillingMethod;
use Spark\Contracts\Actions\UpdatesSubscriptions;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Cashier::ignoreMigrations();

        if (! $this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config/spark.php', 'spark');
        }

        $this->app->singleton('spark.manager', SparkManager::class);
        $this->app->singleton(FrontendState::class);

        $this->app->singleton(CalculatesVatRate::class, Actions\CalculateVatRate::class);
        $this->app->singleton(CreatesSubscriptions::class, Actions\CreateSubscription::class);
        $this->app->singleton(UpdatesBillingMethod::class, Actions\UpdateBillingMethod::class);
        $this->app->singleton(UpdatesSubscriptions::class, Actions\UpdateSubscription::class);

        $this->registerCommands();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (is_array(config('spark.billables')) && count(config('spark.billables')) > 1) {
            throw new RuntimeException('The Stripe edition of Spark only supports a single billable type.');
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'spark');

        $this->configureRoutes();
        $this->configureMigrations();
        $this->configureTranslations();
        $this->configurePublishing();
        $this->configureMoneyFormatting();
    }

    /**
     * Configure the routes offered by the application.
     *
     * @return void
     */
    protected function configureRoutes()
    {
        Route::group([], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
        });
    }

    /**
     * Configure Spark migrations.
     *
     * @return void
     */
    protected function configureMigrations()
    {
        if (Spark::runsMigrations() && $this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Configure Spark translations.
     *
     * @return void
     */
    protected function configureTranslations()
    {
        $this->loadJsonTranslationsFrom(resource_path('lang/spark'));
    }

    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/spark.php' => config_path('spark.php'),
        ], 'spark-config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/spark'),
        ], 'spark-views');

        $this->publishes([
            __DIR__.'/../stubs/en.json' => resource_path('lang/spark/en.json'),
        ], 'spark-lang');

        $this->publishes([
            __DIR__.'/../stubs/SparkServiceProvider.php' => app_path('Providers/SparkServiceProvider.php'),
        ], 'spark-provider');

        $this->publishes([
            __DIR__.'/../database/migrations' => $this->app->databasePath('migrations'),
        ], 'spark-migrations');
    }

    /**
     * Register the Spark Artisan commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\InstallCommand::class,
            ]);
        }
    }

    /**
     * Define the callback Cashier uses for money formatting.
     *
     * @return void
     */
    protected function configureMoneyFormatting()
    {
        Cashier::formatCurrencyUsing(function ($amount, $currency) {
            $money = new Money($amount, new Currency(strtoupper($currency ?? config('cashier.currency'))));

            $numberFormatter = new NumberFormatter(
                config('cashier.currency_locale'), NumberFormatter::CURRENCY
            );

            $numberFormatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS,
                fmod($amount / 100, 1) === 0.0 ? 0 : 6
            );

            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, new ISOCurrencies());

            return $moneyFormatter->format($money);
        });
    }
}
