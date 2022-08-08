<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 *
 * @property int $id
 * @property int $trip_id
 * @property int $user_id
 * @property int $seat_number
 * @property string $payment_method
 * @property string $username
 * @property string $phone_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Trip $trip
 * @property User $user
 *
 * @package App\Models
 */
class Reservation extends Model
{
    use HasFactory;
	protected $table = 'reservations';

	protected $casts = [
		'trip_id' => 'int',
		'user_id' => 'int',
		'seat_number' => 'int'
	];

	protected $fillable = [
		'trip_id',
		'user_id',
		'seat_number',
		'payment_method',
		'username',
		'phone_number'
	];

	public function trip()
	{
		return $this->belongsTo(Trip::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
