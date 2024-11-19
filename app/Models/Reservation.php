<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'reservable_id',
        'reservable_type',
        'reserved_at',
        'due_date'
    ];

    public static $areas = [
        'A1',
        'A2',
        'A3',
        'B1',
    ];

    public static $daysOfWeek = [
        'Lunes',
        'Martes',
        'Miércoles',
        'Jueves',
        'Viernes',
        'Sábado',
        'Domingo',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (!in_array($model->area, self::$areas)) {
                throw new \Exception('Invalid area');
            }

            if (!in_array($model->day_of_week, self::$daysOfWeek)) {
                throw new \Exception('Invalid day of week');
            }
        });
    }

    public function reservable()
    {
        return $this->morphTo();
    }
}
