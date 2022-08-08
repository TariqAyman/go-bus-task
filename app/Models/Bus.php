<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bus
 *
 * @property int $id
 * @property string $name
 * @property string $number
 * @property int $total_seats
 * @property int $seat_number_start
 * @property int $seat_number_end
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Trip[] $trips
 *
 * @package App\Models
 */
class Bus extends Model
{
    use HasFactory;
	protected $table = 'buses';

	protected $casts = [
		'total_seats' => 'int',
		'seat_number_start' => 'int',
		'seat_number_end' => 'int'
	];

	protected $fillable = [
		'name',
		'number',
		'total_seats',
		'seat_number_start',
		'seat_number_end'
	];

	public function trips()
	{
		return $this->hasMany(Trip::class);
	}
}
