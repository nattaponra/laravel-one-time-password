<?php

namespace Nattaponra\OTPGenerator;

use Illuminate\Support\ServiceProvider;

class OTPGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('otpgenerator',function($app){

            return new OTPGenerator;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
