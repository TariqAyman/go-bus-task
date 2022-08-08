<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property City $city
 * @property Collection|Trip[] $trips
 *
 * @package App\Models
 */
class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $casts = [
        'city_id' => 'int'
    ];

    protected $fillable = [
        'name',
        'city_id'
    ];

    protected $appends = [
        'full_name'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function getFullNameAttribute()
    {
        return $this->city->name . " \\ " . $this->attributes['name'];
    }
}
