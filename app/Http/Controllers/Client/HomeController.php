<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $apple = Product::where('pro_category_id', 1)->where('pro_brand_id', 2)
            ->orderBy('pro_id', 'DESC')->limit(20)->get();


        $data = [
            'apple' => $apple
        ];
        return view('client.home.index', $data);
    }
}