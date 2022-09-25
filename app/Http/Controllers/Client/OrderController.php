<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->status)) {
            return view('client.order.index');
        }
        return view('client.order.index');
    }
}