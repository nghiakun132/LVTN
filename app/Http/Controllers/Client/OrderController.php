<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        try {
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
        } catch (\Exception $exception) {
            return view('errors.404');
        }
    }

    public function detail($id)
    {
        try {
            $order = Order::where('id', $id)->where('user_id', session('user')->id)
                ->with([
                    'orderDetails' => function ($query) {
                        $query->with([
                            'product' => function ($query) {
                                $query->with([
                                    'category',
                                    'brand'
                                ]);
                            }
                        ]);
                    },
                    'deliveryAgent'
                ])
                ->first();

            $total = 0;
            foreach ($order->orderDetails as $item) {
                $total += $item->price * $item->quantity;
            }

            $data = [
                'order' => $order,
                'total' => $total,
            ];
            return view('client.order.detail', $data);
        } catch (\Exception $ex) {
            return view('errors.404');
        }
    }

    public function cancel($id)
    {
        try {
            DB::beginTransaction();
            $order = Order::where('id', $id)->where('user_id', session('user')->id)
                ->with([
                    'orderDetails' => function ($query) {
                        $query->with([
                            'product'
                        ]);
                    },
                ])
                ->first();
            $order->status = 0;
            $order->save();
            foreach ($order->orderDetails as $item) {
                Product::where('pro_id', $item->product_id)->increment('pro_quantity', $item->quantity);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Đã hủy đơn hàng');
        } catch (\Exception $ex) {
            report($ex);
            DB::rollBack();
            return redirect()->back()->with('error', 'Hủy đơn hàng thất bại');
        }
    }
}
