<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'discount', 'section', 'status',
        'usage_limit_per_user', 'usage_limit_total',
        'valid_from', 'valid_until'
    ];

    protected $casts = [
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
    ];
    

    public function users()
    {
        return $this->belongsToMany(User::class, 'coupon_user')->withTimestamps();
    }

}
