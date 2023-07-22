<?php

namespace MezPay;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use MezPay\Controllers\PaymentController;


class MezPayServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/mezpay.php' => config_path('mezpay.php'),
        ], 'config');

        // Load the package's migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'mezpay-migrations');

        // Load the custom routes
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mezpay');

        
    }

    public function register()
    {
       
        $this->mergeConfigFrom(__DIR__.'/../config/mezpay.php', 'mezpay');
        // $this->app->singleton('MezPay\PaymentService', function ($app) {
        //     return new PaymentService();
        // });

        // Facade registration
        $this->app->alias(MezPayFacade::class, 'MezPay');

        $this->app->singleton('mezpay', function ($app) {
            return new OrderManager(); 
        });
        require_once __DIR__.'/Helpers/MezPayUrls.php';
       // require_once __DIR__.'/Contracts/PaymentGateway.php';

    }
}
