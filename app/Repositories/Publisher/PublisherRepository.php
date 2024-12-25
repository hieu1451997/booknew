<?php

namespace App\Repositories\Publisher;

use App\Models\Publisher;
use App\Repositories\BaseRepository;

class PublisherRepository extends BaseRepository implements PublisherInterface
{
    public function __construct(Publisher $model)
    {
        parent::__construct($model);
    }
}
