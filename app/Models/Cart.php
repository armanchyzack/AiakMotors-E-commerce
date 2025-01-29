<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'accessory_id', 'quantity'];
    public function accessory()
{
    return $this->belongsTo(Accessory::class); // or another relation depending on your database schema
}


}
