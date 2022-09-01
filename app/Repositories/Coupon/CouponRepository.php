<?php

namespace App\Repositories\Coupon;

use App\Models\Coupons;
use App\Repositories\BaseRepository;

class CouponRepository extends BaseRepository
{
    public function getModel()
    {
        return Coupons::class;
    }

    public function findOne($id)
    {
        return $this->model->where('coupon_id', $id)->first();
    }
}