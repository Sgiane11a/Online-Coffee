<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    // Si la tabla es diferente al plural del nombre del modelo, define la propiedad 'table'
    // protected $table = 'laptops';

    protected $fillable = [
        'nombre',  // Nombre del modelo de laptop
        'marca',  // Marca de la laptop
        'estado',  // Estado de la laptop (disponible, en mantenimiento, etc.)
    ];

    public function reservations()
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }
}
