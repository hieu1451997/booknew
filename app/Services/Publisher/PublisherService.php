<?php

namespace App\Services\Publisher;

use App\Repositories\Publisher\PublisherInterface;
use App\Services\BaseService;

class PublisherService extends BaseService implements PublisherServiceInterface
{

    public function __construct(PublisherInterface $repository)
    {
        parent::__construct($repository);
    }
}