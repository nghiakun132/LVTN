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
}
