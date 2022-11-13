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
        $imports = new imports();
        switch ($condition) {
            case 'week':
                $orders = $orders->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->select(DB::raw('sum(total) as doanhthu'), DB::raw('DATE(created_at) as date'))
                    ->groupBy('date')->orderBy('date', 'asc');
                $imports = $imports->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->select(DB::raw('sum(i_total) as nhaphang'), DB::raw('DATE(created_at) as date'))
                    ->groupBy('date')->orderBy('date', 'asc');
                break;
            case 'month':
                $orders = $orders->select(DB::raw('SUM(total) as doanhthu'), DB::raw('DAY(orders.created_at) as date'))
                    ->whereMonth('orders.created_at', '=', Carbon::now()->month)
                    ->groupBy('date')->orderBy('date', 'asc');

                $imports = $imports->select(DB::raw('SUM(i_total) as nhaphang'), DB::raw('DAY(imports.created_at) as date'))
                    ->whereMonth('imports.created_at', '=', Carbon::now()->month)
                    ->groupBy('date')->orderBy('date', 'asc');
                break;
            case 'year':
                $orders = $orders->select(DB::raw('SUM(total) as doanhthu'), DB::raw('MONTH(orders.created_at) as date'))
                    ->whereYear('orders.created_at', '=', Carbon::now()->year)
                    ->groupBy('date')->orderBy('date', 'asc');

                $imports = $imports->select(DB::raw('SUM(i_total) as nhaphang'), DB::raw('MONTH(imports.created_at) as date'))
                    ->whereYear('imports.created_at', '=', Carbon::now()->year)
                    ->groupBy('date')->orderBy('date', 'asc');

                break;
            default:
                $orders = $orders->select(DB::raw('SUM(total) as doanhthu'), DB::raw('DAY(orders.created_at) as date'))
                    ->whereMonth('orders.created_at', '=', Carbon::now()->month)
                    ->groupBy('date')->orderBy('date', 'asc');

                $imports = $imports->select(DB::raw('SUM(i_total) as nhaphang'), DB::raw('DAY(imports.created_at) as date'))
                    ->whereMonth('imports.created_at', '=', Carbon::now()->month)
                    ->groupBy('date')->orderBy('date', 'asc');
                break;
        }
        $result = $orders->get()->toArray();
        $result2 = $imports->get()->toArray();
        return response()->json([
            'data' => [
                'orders' => $result,
                'imports' => $result2
            ],
            'status' => 200
        ]);
    }

    public function import()
    {
        $imports = imports::select(DB::raw('SUM(i_total) as doanhthu'), DB::raw('DAY(imports.created_at) as date'))
            ->whereMonth('imports.created_at', '=', Carbon::now()->month)
            ->groupBy('date')->orderBy('date', 'asc')->get()->toArray();
        return response()->json([
            'data' => $imports,
            'status' => 200
        ]);
    }
}
