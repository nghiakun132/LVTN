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
                }
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

        $data = [
            'apple' => $apple,
            'end' => $end,
            'detail' => $detail,
        ];
        return view('client.home.index', $data);
    }
}