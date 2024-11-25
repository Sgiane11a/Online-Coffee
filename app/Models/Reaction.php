<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reaction extends Model
{
    use HasFactory;

    // Los campos que son asignables masivamente
    protected $fillable = [
        'user_id', 'reactable_id', 'reactable_type', 'type',
    ];

    // Relación polimórfica
    public function reactable()
    {
        return $this->morphTo();
    }
}

