<?php

namespace App\Services\ProductCategory;

use App\Repositories\ProductCategory\ProductCategoryInterface;
use App\Services\BaseService;

class ProductCategoryService extends BaseService implements ProductCategoryServiceInterface
{

    public function __construct(ProductCategoryInterface $repository)
    {
        parent::__construct($repository);
    }
}