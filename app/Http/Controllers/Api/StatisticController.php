<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\imports;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::where('status', '<>', '0')->get();
        $order = $orders->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });
        $order = $order->map(function ($item) {
            return $item->sum('total');
        });

        $imports = imports::where('i_status', '<>', '0')->get();
        $import = $imports->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });
        $import = $import->map(function ($item) {
            return $item->sum('i_total');
        });
        $arr = [];

        foreach ($order as $key => $value) {
            if ($import->has($key)) {
                $arr[] = [
                    'month' => $key,
                    'order' => $value,
                    'import' => $import[$key]
                ];
            } else {
                $arr[] = [
                    'month' => $key,
                    'order' => $value,
                    'import' => 0
                ];
            }
        }

        // $data = [
        //     'order' => $arr
        // ];

        return response()->json([
            'data' => $arr
        ]);
    }
}
