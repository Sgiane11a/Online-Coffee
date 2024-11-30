<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    // Si la tabla es diferente al plural del nombre del modelo, define la propiedad 'table'
    // protected $table = 'equipos';

    protected $fillable = [
        'nombre',  // Asegúrate de tener un nombre o algún identificador
        'descripcion',
        'estado',  // Si los equipos tienen un estado (disponible, en uso, etc.)
    ];

    public function reservations()
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }
}
