<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cubiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'aforo',
        'descripcion',
        'image_url',
        'image_public_id',
        'disponible',
    ];

    // Relación con las reservas de cubículos
    public function reservas()
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }

    // Método para comprobar si un cubículo está disponible para una fecha y hora
    public function scopeDisponibleParaFecha($query, $fechaReserva)
    {
        return $query->where('disponible', true)
            ->whereDoesntHave('reservas', function ($query) use ($fechaReserva) {
                $query->where('reserved_at', $fechaReserva); // Verifica que no haya reservas en la fecha
            });
    }
}
