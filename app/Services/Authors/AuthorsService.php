<?php

namespace App\Services\Authors;

use App\Repositories\Authors\AuthorsInterface;
use App\Services\BaseService;

class AuthorsService extends BaseService implements AuthorsServiceInterface
{

    public function __construct(AuthorsInterface $repository)
    {
        parent::__construct($repository);
    }
}