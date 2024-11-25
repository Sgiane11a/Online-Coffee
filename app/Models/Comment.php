<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    // ============================
    // Propiedades asignables en masa
    // ============================
    // Define los atributos que pueden ser asignados directamente al crear o actualizar un comentario.
    protected $fillable = [
        'user_id',   // ID del usuario que realizó el comentario
        'post_id',   // ID de la publicación asociada al comentario
        'content',   // Contenido del comentario
    ];

    // ============================
    // Relaciones del modelo
    // ============================

    // Relación uno a muchos inversa con el modelo User.
    // Indica que cada comentario pertenece a un usuario.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
