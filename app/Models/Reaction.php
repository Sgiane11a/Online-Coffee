<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',         // Usuario que hizo la reacción
        'type',            // Tipo de reacción ('like' o 'dislike')
        'reactable_id',    // ID del recurso reaccionado (post o comment)
        'reactable_type',  // Tipo del recurso reaccionado (clase del modelo)
    ];

}
