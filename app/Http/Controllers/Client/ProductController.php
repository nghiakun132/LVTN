<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index($category, $brand, $product)
    {
        try {
            $category = Category::where('c_slug', $category)->first();
            $brand = Brands::where('b_slug', $brand)->first();
            $product = Product::where('pro_slug', $product)
                ->with([
                    'sales' => function ($query) {
                        $query->with([
                            'sales'
                        ]);
                    },
                    'event_details' => function ($query) {
                        $query->with([
                            'events'
                        ]);
                    },
                    'brand',
                    'category',
                    'group'
                ])
                ->first();
            // dd($product);
            $file = $product->pro_detail;
            $tt = [];
            if (!empty($file)) {
                $file = storage_path('app/public/products/' . $file);
                $tt = Excel::toArray('', $file);
                $key = $tt[0][0];
                $value = $tt[0][1];
                $tt = array_combine($key, $value);
            }

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
                'brand' => $brand,
                'tt' => $tt
            ];
            $product->pro_view = $product->pro_view + 1;
            $product->save();
            return view('client.detail.index', $data);
        } catch (\Throwable $th) {
            dd($th);

            return view('errors.404');
        }
    }
    public function watched(Request $request)
    {
        try {
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
        } catch (\Throwable $th) {

            return view('errors.404');
        }
    }
}