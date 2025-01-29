<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'status',
        'desc',
        'slug'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
