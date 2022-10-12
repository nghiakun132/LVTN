<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('user_id', session('user')->id)->orderBy('id', 'desc');

        if (isset($request->status)) {
            switch ($request->status) {
                case 'cho-xac-nhan':
                    $status = 1;
                    break;
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
            }
            $orders = $orders->where('status', $status);
        }
        $data = [
            'orders' => $orders->paginate(10),
        ];
        return view('client.order.index', $data);
    }

    public function detail($id)
    {
        $order = Order::where('id', $id)->where('user_id', session('user')->id)
            ->with([
                'orderDetails' => function ($query) {
                    $query->with('product');
                },
            ])
            ->first();

        $data = [
            'order' => $order,
        ];
        return view('client.order.detail', $data);
    }

    public function cancel($id)
    {
        $order = Order::find($id);
        $order->status = 0;
        $order->save();
        return redirect()->back()->with('success', 'Đã hủy đơn hàng');
    }
}
