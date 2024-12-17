<?php

namespace App\Repositories;

use App\Models\ProductCategory;

class ProductCategoryRepository extends BaseRepository
{
    public function __construct(ProductCategory $productcategory)
    {
        parent::__construct($productcategory);
    }
}