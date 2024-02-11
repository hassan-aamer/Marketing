<?php

namespace App\Providers;

use App\Repository\Auth\AuthRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Products\ProductsRepository;
use App\Interfaces\Auth\AuthRepositoryInterface;
use App\Interfaces\Offers\OffersRepositoryInterface;
use App\Interfaces\Products\ProductsRepositoryInterface;
use App\Repository\Offers\OffersRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
        $this->app->bind(OffersRepositoryInterface::class, OffersRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
