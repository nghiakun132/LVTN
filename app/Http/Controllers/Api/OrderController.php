<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($id)
    {
        try {
            $order = Order::where('order_code', $id)->first();
            if ($order) {
                return response()->json([
                    'order' => [
                        'id' => $order->order_code,
                        'name' => $order->user->name,
                        'phone' => $order->user->phone,
                        'total' => number_format($order->total, 0, ',', '.') . ' đ',
                        'status' => $order->getStatus($order->status),
                        'created_at' => Carbon::parse($order->created_at)->format('d/m/Y H:i:s'),
                    ]
                ]);
            } else {
                return response()->json([
                    'code' => 404,
                    'message' => 'Không tìm thấy đơn hàng'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Lỗi hệ thống'
            ]);
        }
    }
}
