<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cubiculo extends Model
{
    // Si la tabla es diferente al plural del nombre del modelo, define la propiedad 'table'
    // protected $table = 'cubiculos';

    protected $fillable = [
        'nombre',  // Nombre del cubículo o identificador
        'Aforo',  // Aforo del cubículo
        'estado',  // Estado del cubículo (disponible, ocupado, etc.)
    ];

    public function reservations()
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }
}
