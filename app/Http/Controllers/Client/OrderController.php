<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Order_Cancel;
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
                'orders' => $orders->paginate(10),
            ];
            return view('client.order.index', $data);
        } catch (\Exception $exception) {
            report($exception);
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
                                $query->withTrashed();
                                $query->with([
                                    'category' => function ($query) {
                                        $query->withTrashed();
                                    },
                                    'brand' => function ($query) {
                                        $query->withTrashed();
                                    },
                                ]);
                            }
                        ]);
                    },
                    'deliveryAgent' => function ($query) {
                        $query->withTrashed();
                    },
                    'orderCancel'
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
            report($ex);
            return view('errors.404');
        }
    }

    public function cancel($id)
    {

        $order = Order::where('id', $id)->where('user_id', session('user')->id)->first();
        return view('client.order.cancel', compact('order'));
    }
    public function cancelPost(Request $request)
    {
        try {
            DB::beginTransaction();
            $order = Order::where('id', $request->order_id)->where('user_id', session('user')->id)->first();
            $order->status = 0;
            $order->save();

            $orderCancel = new Order_Cancel();
            $orderCancel->order_id = $order->id;
            $orderCancel->reason = $request->reason;
            $orderCancel->save();

            Notification::create([
                'is_admin' => 0,
                'user_id' => session('user')->id,
                'type' => 'Order',
                'message' => 'Đơn hàng ' . $order->order_code . ' đã bị hủy',
            ]);


            DB::commit();


            return response()->json([
                'code' => 200,
                'message' => 'Hủy đơn hàng thành công',
            ]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => $ex->getMessage()
            ]);
        }
    }
}
