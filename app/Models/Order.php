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
        'delivery_agent_id',
        'total',
        'payment_method',
        'status'
    ];

    public function orderDetails()
    {
        return $this->hasMany(Order_details::class, 'order_id');
    }

    public function orderCancel()
    {
        return $this->hasOne(Order_Cancel::class, 'order_id');
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

    public function deliveryAgent()
    {
        return $this->belongsTo(DeliveryAgent::class, 'delivery_agent_id');
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 1:
                return 'Đang chờ xác nhận';

            case 2:
                return 'Đã xác nhận';
            case 3:
                return 'Đang giao hàng';
            case 4:
                return 'Đã giao hàng';
            case 0:
                return 'Đã hủy';
            default:
                return 'Đang chờ xác nhận';
        }
    }
}
