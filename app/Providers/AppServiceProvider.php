<?php

namespace App\Providers;

use App\Interface\AnalyseInterface;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\EleguentAnalyseRepository;
use App\Repositories\EleguentCustomerRepository;
use App\Repositories\EloquentUserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            EloquentUserRepository::class,
        );
        $this->app->bind(
            CustomerRepositoryInterface::class,
            EleguentCustomerRepository::class,

        );

        $this->app->bind(
            AnalyseInterface::class,
            EleguentAnalyseRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
