<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', // Add this line
        // other attributes that can be mass-assigned
    ];
    public function cars()
    {
        return $this->belongsTo(Car::class);
    }


}
