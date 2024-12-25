<?php

namespace App\Providers;

use App\Repositories\ProductCategory\ProductCategoryInterface;
use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\Publisher\PublisherInterface;
use App\Repositories\Publisher\PublisherRepository;
use App\Services\ProductCategory\ProductCategoryService;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\Publisher\PublisherService;
use App\Services\Publisher\PublisherServiceInterface;
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
        $this->app->bind(ProductCategoryInterface::class, ProductCategoryRepository::class);
        $this->app->bind(ProductCategoryServiceInterface::class, ProductCategoryService::class);   

        $this->app->bind(PublisherInterface::class, PublisherRepository::class);
        $this->app->bind(PublisherServiceInterface::class, PublisherService::class);  
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
