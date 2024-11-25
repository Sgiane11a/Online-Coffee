<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // ============================
    // Propiedades asignables en masa
    // ============================
    // Define los atributos que pueden ser asignados directamente a través de métodos como create() o update().
    protected $fillable = [
        'user_id',  // ID del usuario que creó el post
        'title',    // Título del post
        'content',  // Contenido del post
    ];

    // ============================
    // Relaciones del modelo
    // ============================

    // Relación uno a muchos inversa con el modelo User.
    // Indica que cada post pertenece a un usuario.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación uno a muchos con el modelo Comment.
    // Indica que un post puede tener múltiples comentarios.
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relación polimórfica con el modelo Reaction.
    // Indica que un post puede tener múltiples reacciones (likes/dislikes).
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactable');
    }
}
