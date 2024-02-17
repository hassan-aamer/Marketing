<?php

namespace App\Providers;

use App\Interfaces\About\AboutRepositoryInterface;
use App\Repository\Auth\AuthRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Products\ProductsRepository;
use App\Interfaces\Auth\AuthRepositoryInterface;
use App\Interfaces\Contact\ContactRepositoryInterface;
use App\Interfaces\Offers\OffersRepositoryInterface;
use App\Interfaces\Products\ProductsRepositoryInterface;
use App\Interfaces\Reviews\ReviewsRepositoryInterface;
use App\Repository\About\AboutRepository;
use App\Repository\Contact\ContactRepository;
use App\Repository\Offers\OffersRepository;
use App\Repository\Reviews\ReviewsRepository;

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
        $this->app->bind(ReviewsRepositoryInterface::class, ReviewsRepository::class);
        $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
