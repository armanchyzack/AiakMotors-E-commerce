<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected  $fillable = [
        'title',
        'status',
        'slug'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function accessories()
    {
        return $this->hasMany(Accessory::class);
    }
}
