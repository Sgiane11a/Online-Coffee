<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booksrecommendation extends Model
{
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function recomendations ()
    {
        return $this->belongsTo(Book::class, 'recommended_book_id');
    }

}
