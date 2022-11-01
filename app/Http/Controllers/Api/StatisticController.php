<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\imports;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{

    public function index(Request $request)
    {
        $condition = $request->period;

        $orders = Order::where('status', '<>', 0);
        switch ($condition) {
            case 'week':
                $orders = $orders->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->select(DB::raw('sum(total) as doanhthu'), DB::raw('DATE(created_at) as date'))
                    ->groupBy('date')->orderBy('date', 'asc');
                break;
            case 'month':
                $orders = $orders->select(DB::raw('SUM(total) as doanhthu'), DB::raw('DAY(orders.created_at) as date'))
                    ->whereMonth('orders.created_at', '=', Carbon::now()->month)
                    ->groupBy('date')->orderBy('date', 'asc');
                break;
            case 'year':
                $orders = $orders->select(DB::raw('SUM(total) as doanhthu'), DB::raw('MONTH(orders.created_at) as date'))
                    ->whereYear('orders.created_at', '=', Carbon::now()->year)
                    ->groupBy('date')->orderBy('date', 'asc');
                break;
            default:
                $orders = $orders->select(DB::raw('SUM(total) as doanhthu'), DB::raw('DAY(orders.created_at) as date'))
                    ->whereMonth('orders.created_at', '=', Carbon::now()->month)
                    ->groupBy('date')->orderBy('date', 'asc');
                break;
        }
        $result = $orders->get()->toArray();
        return response()->json([
            'data' => $result,
            'status' => 200
        ]);
    }
}
