<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\ICategoryRepository;
use App\Interface\IProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ICategoryRepository::class,CategoryRepository::class);
        $this->app->bind(IProductRepository::class,ProductRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
