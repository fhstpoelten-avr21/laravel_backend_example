<?php

namespace App\Providers;

use App\Contracts\AirlineRequestInterface;
use App\Contracts\PassengerRequestInterface;
use App\Contracts\PassengerServiceInterface;
use App\Services\PassengerService;
use App\Services\RequestService;
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
        $this->app->singleton(AirlineRequestInterface::class, function () {
            return new RequestService(config('services.airlines.base_url'));
        });
        $this->app->singleton(PassengerRequestInterface::class, function () {
            return new RequestService(config('services.passengers.base_url'));
        });
        $this->app->singleton(PassengerServiceInterface::class, function () {
            return new PassengerService();
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
