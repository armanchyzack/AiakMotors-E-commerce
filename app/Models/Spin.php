<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spin extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'prize', 'won_at', 'expires_at'
    ];
    protected $dates = ['expires_at'];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Set 'won_at' to the same value as 'created_at'
            $model->won_at = $model->created_at ?? Carbon::now(); // Use the current time if 'created_at' is not set yet
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
