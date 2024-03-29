<?php

namespace App\Providers;

use App\Classes\MailtrapEmailDrive;
use App\Classes\RandomGenerator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use App\Classes\Otp;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Otp::class, function (Application $app) {
            return new Otp($app->make(MailtrapEmailDrive::class),$app->make(RandomGenerator::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
