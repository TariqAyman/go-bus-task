<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * Class Trip
 *
 * @property int $id
 * @property string $name
 * @property int $area_id
 * @property int $bus_id
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Area $area
 * @property Bus $bus
 * @property Collection|Reservation[] $reservations
 *
 * @package App\Models
 */
class Trip extends Model
{
    use HasFactory;

    protected $table = 'trips';

    protected $casts = [
        'area_id' => 'int',
        'bus_id' => 'int'
    ];

    protected $fillable = [
        'name',
        'from_area_id',
        'to_area_id',
        'bus_id',
        'status'
    ];

    const ACTIVE_STATUS = 'active';
    const STATED_STATUS = 'stated';
    const ENDED_STATUS = 'ended';
    const CANCELED_STATUS = 'canceled';

    const TRIP_STATUS = [
        self::ACTIVE_STATUS,
        self::STATED_STATUS,
        self::ENDED_STATUS,
        self::CANCELED_STATUS,
    ];

    public function fromArea()
    {
        return $this->belongsTo(Area::class, 'from_area_id');
    }

    public function toArea()
    {
        return $this->belongsTo(Area::class, 'to_area_id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function availableSeatsCount()
    {
        return $this->bus->total_seats - $this->reservations()->count();
    }

    public function availableSeats()
    {
        $bookedSeats = $this->reservations()->pluck('seat_number')->toArray();

        $listSeats = $this->getListSeats();

        return Arr::where($listSeats, function ($value, $key) use ($bookedSeats) {
            return !in_array($value, $bookedSeats);
        });
    }

    private function getListSeats()
    {
        $seats = [];

        for ($i = $this->bus->seat_number_start; $i <= $this->bus->seat_number_end; $i++) {
            $seats[$i] = $i;
        }

        return $seats;
    }
}
