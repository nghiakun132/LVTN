<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                'total' => $total
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
}
