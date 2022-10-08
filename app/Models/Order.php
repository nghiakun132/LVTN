<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_code',
        'user_id',
        'address_id',
        'coupon_id',
        'total',
        'payment_method',
        'status'
    ];

    public function orderDetails()
    {
        return $this->hasMany(Order_details::class, 'order_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupons::class, 'coupon_id');
    }
}
