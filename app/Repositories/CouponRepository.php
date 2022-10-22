<?php

namespace App\Repositories;

use App\Models\Coupons;

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
