<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reservable_id',
        'reservable_type',
        'reserved_at',
        'due_date',
    ];

    // Relación polimórfica con Equipo o Cubiculo
    public function reservable()
    {
        return $this->morphTo();
    }

    // Relación con el usuario que hace la reserva
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
