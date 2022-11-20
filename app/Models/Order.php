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

    public function convertStatus()
    {
        $status = '';
        switch ($this->status) {
            case 0:
                $status = 'Đã hủy';
                break;
            case 2:
                $status =  'Đã xác nhận';
                break;
            case 3:
                $status = 'Đang giao hàng';
                break;
            case 4:
                $status = 'Đã giao hàng';
                break;
            case 1:
            default:
                $status =  'Đang chờ xác nhận';
                break;
        }
        return $status;
    }

    public function getStatus()
    {
        $status = '';
        switch ($this->status) {
            case 2:
                $status =  '<span class="badge badge-primary">Đã xác nhận</span>';
                break;
            case 3:
                $status =  '<span class="badge badge-warning">Đang giao hàng</span>';
                break;
            case 4:
                $status =  '<span class="badge badge-info">Đã giao hàng</span>';
                break;
            case 0:
                $status =  '<span class="badge badge-danger">Đã hủy</span>';
                break;
            case 1:
            default:
                $status =  '<span class="badge badge-success">Đang chờ xác nhận</span>';
                break;
        }
        return $status;
    }
}
