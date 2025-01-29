<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopUpMessage extends Model
{
    use HasFactory;
    protected $fillable = ['description']; // ✅ Add 'description' to allow mass assignment

}
