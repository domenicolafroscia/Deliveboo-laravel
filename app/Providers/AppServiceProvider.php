<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '7vgbrmwvqp5dfsrg',
                    'publicKey' => 'nyz8zh7dpy9pyfmh',
                    'privateKey' => '82c8bdf932ba137c7a46a96aa2878dff'
                ]);
        });
    }
}
