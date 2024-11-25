<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',     // Usuario que realizó el comentario
        'post_id',     // Publicación asociada al comentario
        'content',     // Contenido del comentario
    ];
    

}
