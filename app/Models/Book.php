<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title', // Agregada la coma
        'author', // Agregada la coma
        'category_id', // Agregada la coma
        'language', // Agregada la coma
        'publication_year', // Agregada la coma
        'description', // Agregada la coma
        'image_url', // Agregada la coma
        'image_public_id', // Agregada la coma
        'digital_version_link' // Agregada la coma
    ];

    public function reservations()
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }

    public function category()
    {
        return $this->belongsTo(Bookscategory::class, 'category_id');
    }
    

    public function reviews()
    {
        return $this->hasMany(Booksreviews::class); // Revisa si la clase se llama Booksreviews
    }

    public function recommendations()
    {
        return $this->hasMany(Booksrecommendation::class); // Revisa si la clase se llama Booksrecommendation
    }

    public function bookComments()
    {
            return $this->hasMany(BookComment::class);
    }
}
