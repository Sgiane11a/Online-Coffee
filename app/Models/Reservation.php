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
        'due_date',
        'day_of_week',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    
    public static $daysOfWeek = [
        0 => 'Domingo',
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miércoles',
        4 => 'Jueves',
        5 => 'Viernes',
        6 => 'Sábado',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (!array_key_exists($model->day_of_week, self::$daysOfWeek)) {
                throw new \InvalidArgumentException('Día de la semana inválido.');
            }
        });
    }

    public function reservable()
    {
        return $this->morphTo();
    }

     /**
     * Get the human-readable day of the week.
     *
     * @return string
     */
    public function getDayOfWeekNameAttribute(): string
    {
        return self::$daysOfWeek[$this->day_of_week] ?? 'Desconocido';
    }
}
