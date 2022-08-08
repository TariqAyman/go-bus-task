<?php
namespace App\Repositories;

use App\Repositories\AbstractRepository\BaseRepository;
use App\Models\Bus;

class BusRepository extends BaseRepository
{
    public function __construct(Bus $model)
    {
        parent::__construct($model);
    }
}
