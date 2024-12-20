<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'type',
        'descripcion',
        'image_url',
        'image_public_id',
        'disponible',
    ];

    // Relación con las reservas de computadoras y laptops
    public function reservas()
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }

    // Método para comprobar si un equipo está disponible para una fecha y hora
    public function scopeDisponibleParaFecha($query, $fechaReserva)
    {
        return $query->where('disponible', true)
            ->whereDoesntHave('reservas', function ($query) use ($fechaReserva) {
                $query->where('reserved_at', $fechaReserva); // Verifica que no haya reservas en la fecha
            });
    }
}
