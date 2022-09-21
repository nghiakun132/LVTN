<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    public function index($category, $brand, $product)
    {
        $category = Category::where('c_slug', $category)->first();
        $brand = Brands::where('b_slug', $brand)->first();
        $product = Product::where('pro_slug', $product)
            ->with([
                'sales' => function ($query) {
                    $query->with([
                        'sales'
                    ]);
                },
                'brand',
                'category',
                'group'
            ])
            ->first();
        $watched = json_decode(Cookie::get('watched'));
        if ($watched) {
            if (!in_array($product->pro_id, $watched)) {
                array_push($watched, $product->pro_id);
                Cookie::queue('watched', json_encode($watched), 60 * 24 * 30);
            }
        } else {
            $watched = [];
            array_push($watched, $product->pro_id);
            Cookie::queue('watched', json_encode($watched), 60 * 24 * 30);
        }
        $images = $product->images;
        $data = [
            'product' => $product,
            'images' => $images,
            'category' => $category,
            'brand' => $brand
        ];
        return view('client.detail.index', $data);
    }
    public function watched(Request $request)
    {
        $watched = Cookie::get('watched');
        $products = Product::whereIn('pro_id', json_decode($watched))
            ->with([
                'sales' => function ($query) {
                    $query->with([
                        'sales'
                    ]);
                },
                'brand',
                'category',
                'group'
            ])->paginate(12);
        $data = [
            'products' => $products
        ];
        return view('client.detail.watched', $data);
    }
}