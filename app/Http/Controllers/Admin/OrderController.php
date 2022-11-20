<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::orderBy('id', 'desc');

        if (isset($request->status)) {
            switch ($request->status) {
                case 'da-xac-nhan':
                    $status = 2;
                    break;
                case 'dang-van-chuyen':
                    $status = 3;
                    break;
                case 'da-giao':
                    $status = 4;
                    break;
                case 'da-huy':
                    $status = 0;
                    break;
                case 'cho-xac-nhan':
                default:
                    $status = 1;
                    break;
            }
            $orders = $orders->where('status', $status);
        }

        $data = [
            'orders' => $orders->get(),
        ];
        return view('admin.order.index', $data);
    }

    public function detail($id)
    {
        $order = Order::where('id', $id)->with([
            'user' => function ($query) {
                $query->withTrashed();
            },
            'address' => function ($query) {
                $query->withTrashed();
            },
            'orderDetails',
            'orderDetails.product' => function ($query) {
                $query->withTrashed();
            },
        ])->first();
        $data = [
            'order' => $order,
        ];
        return view('admin.order.detail', $data);
    }

    public function changeStatus($id)
    {
        try {
            DB::beginTransaction();
            $order = Order::find($id);
            if ($order->status == 1) {
                $order->status = 2;
                $message = 'Đã xác nhận đơn hàng';
            } else if ($order->status == 2) {
                $order->status = 3;
                $message = 'Đang giao hàng';
            } else if ($order->status == 3) {
                $order->status = 4;
                $message = 'Đã đến tay khách hàng';
            }
            $order->save();

            Notification::create([
                'is_admin' => 0,
                'user_id' => $order->user_id,
                'type' => 'Order',
                'message' => 'Đơn hàng ' . $order->order_code . ' ' . $message . '!',
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }

    public function Cancel($id)
    {
        try {
            DB::beginTransaction();
            $order = Order::find($id);
            $order->status = 0;
            $order->save();
            foreach ($order->orderDetails as $orderDetail) {
                Product::where('pro_id', $orderDetail->product_id)
                    ->withTrashed()
                    ->increment('pro_quantity', $orderDetail->quantity);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Hủy đơn hàng thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }

    public function print($id)
    {
        $order = Order::where('id', $id)->with([
            'user' => function ($query) {
                $query->withTrashed();
            },
            'address' => function ($query) {
                $query->withTrashed();
            },
            'orderDetails',
            'orderDetails.product' => function ($query) {
                $query->withTrashed();
            },
        ])->first();
        $pdf = PDF::loadView('admin.order.print', [
            'order' => $order,
        ]);
        return $pdf->download(
            'DH' . date('YmdHis') . '.pdf'
        );
    }
}
