<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupons;
use App\Models\DeliveryAgent;
use App\Models\Order;
use App\Models\Order_details;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CartController extends Controller
{
    public function index()
    {
        try {
            $total = 0;
            $carts = Cart::where('user_id', session('user')->id)
                ->with([
                    'products' => function ($query) {
                        $query->with([
                            'category',
                            'brand'
                        ]);
                    }
                ])
                ->get();
            foreach ($carts as $cart) {
                $total += $cart->price * $cart->quantity;
            }
            $data = [
                'carts' => $carts,
                'total' => $total,
            ];
            return view('client.cart.index', $data);
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data  = $request->all();
            $data['user_id'] = session('user')->id;
            $cart = Cart::where('user_id', $data['user_id'])->where('product_id', $data['product_id'])->first();
            if ($cart) {
                $cart->quantity += $data['quantity'];
                $cart->save();
                Product::where('pro_id', $data['product_id'])->decrement('pro_quantity', $data['quantity']);
            } else {
                Cart::create($data);
                Product::where('pro_id', $data['product_id'])->decrement('pro_quantity', $data['quantity']);
            }
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Thêm vào giỏ hàng thành công'
            ], 200);
        } catch (\Exception $ex) {
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $cart = Cart::find($data['id']);
            Product::where('pro_id', $cart->product_id)->increment('pro_quantity', $cart->quantity);
            Product::where('pro_id', $cart->product_id)->decrement('pro_quantity', $data['quantity']);
            if ($cart->quantity > $cart->products->pro_quantity) {
                DB::rollBack();
                return response()->json([
                    'code' => 500,
                    'message' => 'Số lượng sản phẩm không đủ'
                ], 500);
            }
            $cart->quantity = $data['quantity'];
            $cart->save();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Cập nhật giỏ hàng thành công'
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Cập nhật giỏ hàng thất bại'
            ], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $cart = Cart::find($data['id']);
            Product::where('pro_id', $cart->product_id)->increment('pro_quantity', $cart->quantity);
            $cart->delete();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Xóa sản phẩm khỏi giỏ hàng thành công'
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Xóa sản phẩm khỏi giỏ hàng thất bại'
            ], 500);
        }
    }

    public function clear()
    {
        try {
            DB::beginTransaction();
            $carts = Cart::where('user_id', session('user')->id)->get();
            foreach ($carts as $cart) {
                Product::where('pro_id', $cart->product_id)->increment('pro_quantity', $cart->quantity);
                $cart->delete();
            }
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Xóa giỏ hàng thành công'
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Xóa giỏ hàng thất bại'
            ], 500);
        }
    }

    public function updateAll(Request $request)
    {
        $carts = $request->cart;
        try {
            DB::beginTransaction();
            foreach ($carts as $cart) {
                $cartItem = Cart::find($cart['id']);
                Product::where('pro_id', $cartItem->product_id)->increment('pro_quantity', $cartItem->quantity);
                Product::where('pro_id', $cartItem->product_id)->decrement('pro_quantity', $cart['quantity']);
                $cartItem->quantity = $cart['quantity'];
                $cartItem->save();
            }
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Cập nhật giỏ hàng thành công'
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Cập nhật giỏ hàng thất bại'
            ], 500);
        }
    }

    public function checkout(Request $request)
    {
        $deliveries = DeliveryAgent::all();
        $user = User::where('id', session('user')->id)->with('address')
            ->select('id', 'name', 'email', 'phone')
            ->first();

        $carts = Cart::where('user_id', session('user')->id)
            ->with([
                'products' => function ($query) {
                    $query->with([
                        'category',
                        'brand'
                    ]);
                }
            ])
            ->get();
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->price * $cart->quantity;
        }
        $data = [
            'carts' => $carts,
            'user' => $user,
            'deliveries' => $deliveries,
            'total' => $total
        ];
        return view('client.cart.checkout', $data);
    }

    public function applyCoupon(Request $request)
    {
        try {
            $coupon = Coupons::where('coupon_code', $request->coupon_code)
                ->where('coupon_status', 1)
                ->first();
            if (!$coupon) {
                return redirect()->back()->with('error', 'Mã giảm giá không tồn tại hoặc đã hết hạn');
            }
            session()->put('coupon', [
                'name' => $coupon->coupon_code,
                'discount' => $coupon->coupon_discount,
            ]);
            return redirect()->back()->with('success', 'Áp dụng mã giảm giá thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }

    public function cancelCoupon(Request $request)
    {
        try {
            session()->forget('coupon');
            return response()->json([
                'code' => 200,
                'message' => 'Hủy mã giảm giá thành công'
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'code' => 500,
                'message' => 'Hủy mã giảm giá thất bại'
            ], 500);
        }
    }

    public function checkoutPost(Request $request)
    {
        session()->put('address_id', $request->address_user);
        session()->put('note', $request->note);
        session()->put('delivery_agent_id', $request->delivery_method);
        $user = session('user');
        $carts = Cart::where('user_id', $user->id)->get();
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->price * $cart->quantity;
        }
        $coupon = $request->coupon_code;
        if ($coupon) {
            $cp = Coupons::where('coupon_code', $coupon)
                ->where('coupon_status', 1)
                ->first()->coupon_discount;
            if ($cp) {
                $total = $total - ($cp / 100 * $total);
            }
        }
        switch ($request->payment_method) {
            case 'Paypal':
                $paypal = new PayPalClient();
                $paypal->setApiCredentials(config('paypal'));
                $paypalToken = $paypal->getAccessToken();
                $response = $paypal->createOrder([
                    "intent" => "CAPTURE",
                    "application_context" => [
                        "return_url" => route('successTransaction'),
                        "cancel_url" => route('cancelTransaction'),
                    ],
                    "purchase_units" => [
                        0 => [
                            "amount" => [
                                "currency_code" => "USD",
                                "value" => round($total  / 22850, 2),
                            ]
                        ]
                    ]
                ]);
                if (isset($response['id']) && $response['id'] != null) {
                    foreach ($response['links'] as $links) {
                        if ($links['rel'] == 'approve') {
                            return redirect()->away($links['href']);
                        }
                    }
                    return redirect()
                        ->route('client.cart.checkout')
                        ->with('error', 'Something went wrong.');
                } else {
                    return redirect()
                        ->route('client.cart.checkout')
                        ->with('error', $response['message'] ?? 'Something went wrong.');
                }
                break;
            case 'COD':
                $this->action($total, "COD");
                return redirect()->route('client.cart.success');
                break;
            case 'VnPay':
                try {
                    $vnp_TmnCode = config('order.VNPay.vnp_TmnCode');
                    $vnp_HashSecret = config('order.VNPay.vnp_HashSecret');
                    $vnp_Url = config('order.VNPay.vnp_Url');
                    $vnp_Returnurl = config('order.VNPay.vnp_Returnurl');
                    $vnp_apiUrl = config('order.VNPay.vnp_apiUrl');
                    $vnp_TxnRef = 'test' . date('YmdHis');
                    $vnp_OrderInfo = "Thanh toán đơn hàng";
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = (int)($total) * 100;
                    $vnp_Locale = 'vn';
                    $vnp_BankCode = 'NCB';
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    //Add Params of 2.0.1 Version
                    // $vnp_ExpireDate = $expire->format('YmdHis');

                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                        // "vnp_ExpireDate" => $vnp_ExpireDate,
                    );
                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                    }

                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }
                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array(
                        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                    );
                    return redirect()->away($vnp_Url);
                } catch (\Exception $exception) {
                    return redirect()->back()->with('error', 'Có lỗi xảy ra');
                }
                break;
            default:
                break;
        }
    }

    public function vnpay()
    {
        if (isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == '00') {
            $this->action($_GET['vnp_Amount'] / 100, "Thanh toán qua VNPAY");
            return redirect()->route('client.cart.success');
        } else {
            return redirect()->route('client.cart.checkout')->with('error', 'Thanh toán thất bại');
        }
    }

    public function cancelTransaction()
    {
        return redirect()->route('client.cart.checkout')->with('error', 'Thanh toán thất bại');
    }

    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            try {
                DB::beginTransaction();
                $carts =  Cart::where('user_id', session('user')->id)->get();
                $total = 0;
                foreach ($carts as $cart) {
                    $total += $cart->price * $cart->quantity;
                }
                if (session('coupon')) {
                    $coupon = Coupons::where('coupon_code', session('coupon')['name'])
                        ->where('coupon_status', 1)
                        ->first();
                    $total = $total - ($coupon->coupon_discount / 100 * $total);
                }

                $fee = DeliveryAgent::where('id', session('delivery_agent_id'))->first();

                $order = new Order();
                $order->order_code = 'DH' . date('ymdHis') . strtoupper(Str::random(8));
                $order->user_id = session('user')->id;
                $order->total = $total + $fee->fee;
                $order->note = session('note');
                $order->delivery_agent_id =  $fee->id;
                $order->payment_method = 'Paypal';
                $order->address_id = session('address_id');
                $order->status = 1;
                $order->save();

                foreach ($carts as $cart) {
                    $orderDetail = new Order_details();
                    $orderDetail->order_id = $order->id;
                    $orderDetail->product_id = $cart->product_id;
                    $orderDetail->quantity = $cart->quantity;
                    $orderDetail->price = $cart->price;
                    $orderDetail->save();
                }
                if (session('coupon')) {
                    $coupon = Coupons::where('coupon_code', session('coupon')['name'])
                        ->where('coupon_status', 1)
                        ->first();
                    $coupon->coupon_status = 0;
                    $coupon->save();
                }
                Cart::where('user_id', session('user')->id)->delete();
                session()->forget('coupon');
                session()->forget('address_id');
                DB::commit();
                return redirect()->route('client.cart.success');
            } catch (\Exception $exception) {
                DB::rollBack();
                return redirect()->route('client.cart.checkout')->with('error', 'Thanh toán thất bại');
            }
        } else {
            return redirect()
                ->route('client.cart.checkout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function success()
    {
        return view('client.cart.success');
    }

    public function action($amount, $method)
    {
        try {
            $fee = DeliveryAgent::where('id', session('delivery_agent_id'))->first();
            $carts = Cart::where('user_id', session('user')->id)->get();
            DB::beginTransaction();
            $order = new Order();
            $order->order_code = 'DH' . date('ymdHis') . strtoupper(Str::random(8));
            $order->user_id = session('user')->id;
            $order->total = $amount + $fee->fee;
            $order->note = session('note');
            $order->delivery_agent_id = $fee->id;
            $order->payment_method = $method;
            $order->address_id = session('address_id');
            $order->status = 1;
            $order->save();

            foreach ($carts as $cart) {
                $orderDetail = new Order_details();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cart->product_id;
                $orderDetail->quantity = $cart->quantity;
                $orderDetail->price = $cart->price;
                $orderDetail->save();
            }
            if (session('coupon')) {
                $coupon = Coupons::where('coupon_code', session('coupon')['name'])
                    ->where('coupon_status', 1)
                    ->first();
                $coupon->coupon_status = 0;
                $coupon->save();
            }
            Cart::where('user_id', session('user')->id)->delete();
            session()->forget('coupon');
            session()->forget('address_id');
            session()->forget('note');
            session()->forget('delivery_agent_id');
            DB::commit();
            return redirect()->route('client.cart.success');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('client.cart.checkout')->with('error', 'Thanh toán thất bại');
        }
    }
}
