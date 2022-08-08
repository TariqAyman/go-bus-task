<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository\BaseRepository;
use App\Models\Area;

class AreaRepository extends BaseRepository
{
    public function __construct(Area $model)
    {
        parent::__construct($model);
    }

    public function getPluck($value = 'name', $key = 'id')
    {
        return $this->model::query()->get()->pluck($value, $key);
    }
}
