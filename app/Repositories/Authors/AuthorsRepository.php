<?php

namespace App\Repositories\Authors;

use App\Models\Author;
use App\Repositories\BaseRepository;

class AuthorsRepository extends BaseRepository implements AuthorsInterface
{
    public function __construct(Author $model)
    {
        parent::__construct($model);
    }
}