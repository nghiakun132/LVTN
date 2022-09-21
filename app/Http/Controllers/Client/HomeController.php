<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $detail = [];
        $end = '';
        $apple = Product::where('pro_category_id', 1)->where('pro_brand_id', 2)
            ->with([
                'sales' => function ($query) {
                    $query->with([
                        'sales'
                    ]);
                },
                'brand',
                'category'
            ])
            ->orderBy('pro_id', 'DESC')->limit(20)->get();
        $event = Events::where('status', 0)->first();
        if ($event) {
            $end = date('Y/m/d H:i:s', strtotime($event->end_date));
            $detail = $event->with([
                'event_details' => function ($query) {
                    $query->with([
                        'products'
                    ]);
                }
            ])->first();
        }

        $laptops = Product::where('pro_category_id', 2)
            ->with([
                'sales' => function ($query) {
                    $query->with([
                        'sales'
                    ]);
                },
                'brand',
                'category'
            ])
            ->orderBy('pro_view', 'DESC')->limit(20)->get();
        $phones = Product::where('pro_category_id', 1)
            ->with([
                'sales' => function ($query) {
                    $query->with([
                        'sales'
                    ]);
                },
                'brand',
                'category'
            ])
            ->orderBy('pro_view', 'DESC')->limit(20)->get();

        $watchs = Product::where('pro_category_id', 11)
            ->with([
                'sales' => function ($query) {
                    $query->with([
                        'sales'
                    ]);
                },
                'brand',
                'category'
            ])
            ->orderBy('pro_view', 'DESC')->limit(20)->get();

        $data = [
            'apple' => $apple,
            'end' => $end,
            'detail' => $detail,
            'laptops' => $laptops,
            'phones' => $phones,
            'watchs' => $watchs,
        ];
        return view('client.home.index', $data);
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $products = Product::where('pro_name', 'LIKE', '%' . $keyword . '%')
            ->with([
                'sales' => function ($query) {
                    $query->with([
                        'sales'
                    ]);
                },
                'brand',
                'category'
            ])
            ->orderBy('pro_id', 'DESC')->paginate(10);
        return view('client.home.search', compact('products', 'keyword'));
    }
    public function searchAjax(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $products = Product::where('pro_name', 'LIKE', '%' . $request->search . '%')
                ->with([
                    'sales' => function ($query) {
                        $query->with([
                            'sales'
                        ]);
                    },
                    'brand',
                    'category',
                    'group'
                ])->limit(5)->get();

            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= '<div onmousedown="return false;" class="autocomplete-suggestion" data-index="' . $key . '">
                        <div class="search-item" onclick="#">
                            <div class="img"><img
                                    src="' . asset('images/products/' . $product->pro_avatar) . '" />
                            </div>
                            <div class="info">
                                <h2>
                                    <a href="' . route('client.product', [
                        'slug' => $product->category->c_slug,
                        'brand' => $product->brand->b_slug,
                        'product' => $product->pro_slug,
                    ]) . '">' . $product->pro_name . '</a>
                                </h2>
                                <h3><strike></strike> ' . number_format($product->pro_price) . ' ₫</h3>
                            </div>
                        </div>
                    </div>';
                }
                $output .= '<p class="more-results">
                Nhấn Enter để xem tất cả kết quả cho <strong>' . $request->search . '</strong></p>';
            }
            return Response($output);
        }
    }
}