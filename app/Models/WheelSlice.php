<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheelSlice extends Model
{
    use HasFactory;
    protected $fillable = [
        'slice_one',
        'slice_two',
        'slice_three',
        'slice_four',
        'slice_five',
        'slice_six',
        'slice_seven',
        'slice_eight',
    ];
}
