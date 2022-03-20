<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Request::macro('isAdmin', function () {
            return str_starts_with($this->getPathInfo(), '/admin/') || $this->getPathInfo() == "/admin";
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Unguard all models
        Model::unguard();

        // Add cascadeDelete macro
        Relation::macro('cascadeDelete', function() {
            $this->chunk(500, function($chunks){
                $chunks->each(function($row) {
                    $row->delete();
                });
            });
        });
    }
}
