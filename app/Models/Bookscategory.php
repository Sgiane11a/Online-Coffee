<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Bookscategory extends Model
{

    protected $table = 'book_categories'; // Asegúrate de que este nombre coincida con la tabla en la base de datos

    // Asegúrate de que los campos sean asignables
    protected $fillable = ['name'];  // El campo 'name' debe ser asignable

    // Si no quieres usar timestamps, desactívalos
    public $timestamps = true;  // Esto debería estar en true si estás usando timestamps
    use HasFactory;

    // Relación inversa (una categoría tiene muchos libros)
    public function books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }

}
