<?php

namespace App\Providers;

use App\Repository\Auth\AuthRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Auth\AuthRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
