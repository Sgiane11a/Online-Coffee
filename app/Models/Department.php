<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function careers()
    {
        return $this->hasMany(Career::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
