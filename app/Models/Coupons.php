<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $primaryKey = 'coupon_id';
    protected $fillable = ['coupon_code', 'coupon_discount', 'coupon_status', 'is_send'];
}
