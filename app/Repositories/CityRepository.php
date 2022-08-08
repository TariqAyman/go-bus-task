<?php
namespace App\Repositories;

use App\Repositories\AbstractRepository\BaseRepository;
use App\Models\City;

class CityRepository extends BaseRepository
{
    public function __construct(City $model)
    {
        parent::__construct($model);
    }
}
