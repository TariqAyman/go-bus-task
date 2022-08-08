<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository\BaseRepository;
use App\Models\Reservation;

class ReservationRepository extends BaseRepository
{
    public function __construct(Reservation $model)
    {
        parent::__construct($model);
    }

    public function create(array $all)
    {
        $all += [
            'user_id' => auth()->user()->id
        ];

        $this->store($all);
    }

    public function getUserReservation()
    {
        return $this->model::query()->where('user_id', auth()->user()->id)->paginate(10);
    }

    public function checkSeat($seat_number, $trip_id)
    {
        return $this->model::query()
            ->where('seat_number', $seat_number)
            ->where('trip_id', $trip_id)
            ->exists();
    }
}
