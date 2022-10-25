<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CouponRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    protected $couponRepository;

    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function index()
    {
        $coupons = $this->couponRepository->getAll();
        $data = [
            'coupons' => $coupons,
        ];
        return view('admin.coupon.index', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'coupon_discount' => 'required|numeric',
        ], [
            'coupon_discount.required' => 'Bạn chưa nhập giảm giá',
            'coupon_discount.numeric' => 'Giảm giá phải là số',
        ]);

        $discount = $request->coupon_discount;
        $coupon_code = "NghiaBui" . Str::random(10);

        try {
            DB::beginTransaction();
            $this->couponRepository->create([
                'coupon_code' => $coupon_code,
                'coupon_discount' => $discount,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm mã giảm giá thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('error', 'Thêm mã giảm giá thất bại');
    }
}
