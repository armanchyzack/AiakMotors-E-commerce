<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'name', 'phone', 'address', 'product_names',
        'total', 'discount_amount', 'discounted_total', 'payment_method', 'status'
    ];


    public function confirmedOrders()
    {
        return $this->hasMany(ConfirmedOrder::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }





}
