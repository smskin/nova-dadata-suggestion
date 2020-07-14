<?php

namespace SMSkin\DaDataSuggestion;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Route;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/dadata.php' => config_path('dadata.php')], 'config');

        Nova::serving(function (ServingNova $event) {
            Nova::script('dadata-suggestion', __DIR__.'/../dist/js/field.js');
            Nova::style('dadata-suggestion', __DIR__.'/../dist/css/field.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova'])
            ->namespace('SMSkin\DaDataSuggestion\Http\Controllers')
            ->prefix('vendor/smskin/nova-dadata-suggestion')
            ->group(__DIR__.'/../routes/api.php');
    }
}
