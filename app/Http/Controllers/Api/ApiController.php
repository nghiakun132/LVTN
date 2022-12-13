<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getProducts(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where('pro_name', 'like', '%' . $keyword . '%')
        ->select('pro_name', 'pro_id', 'pro_slug', 'pro_avatar', 'pro_price', 'pro_sale')
        ->get();
        return response()->json($products);
    }
}
