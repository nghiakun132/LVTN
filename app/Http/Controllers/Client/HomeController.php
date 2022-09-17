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
                }
            ])
            ->orderBy('pro_id', 'DESC')->paginate(10);
        dd($products->toArray());
    }
}