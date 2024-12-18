<?php

namespace App\Repositories\ProductCategory;

use App\Models\ProductCategory;
use App\Repositories\BaseRepository;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryInterface
{
    public function __construct(ProductCategory $model)
    {
        parent::__construct($model);
    }
}
