<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository\BaseRepository;
use App\Models\Trip;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TripRepository extends BaseRepository
{
    public function __construct(Trip $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int $itemsPerPage
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function getActiveTrip($itemsPerPage = 10, array $filters = [])
    {
        $query = $this->model::query();

        if (!empty($filters['form_area_id'])) {
            $query = $query->where('form_area_id', $filters['form_area_id']);
        }

        if (!empty($filters['to_area_id'])) {
            $query = $query->where('to_area_id', $filters['to_area_id']);
        }

        return $query->where('status', Trip::ACTIVE_STATUS)->paginate($itemsPerPage);
    }
}
