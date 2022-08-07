<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $test = 1;
        if (isset($request->id)) {
            $test = $request->id;
        }
        return view('client.order.index', compact('test'));
    }
}