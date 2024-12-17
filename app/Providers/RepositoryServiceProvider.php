<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use App\Repositories\ProductCategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, BaseRepository::class);

        $this->app->bind(ProductCategoryRepository::class, function ($app){
            return new ProductCategoryRepository($app->make(\App\Models\ProductCategory::class));
        });
    }
}