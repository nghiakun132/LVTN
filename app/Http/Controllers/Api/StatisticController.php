<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\imports;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{

    public function index(Request $request)
    {
        $condition = $request->period;

        $orders = Order::where('status', '<>', 0);
        $imports = new imports();
        switch ($condition) {
            case 'year':
                $orders = $orders->select(DB::raw('SUM(total) as doanhthu'), DB::raw('MONTH(orders.created_at) as date'))
                    ->whereYear('orders.created_at', '=', Carbon::now()->year)
                    ->groupBy('date')->orderBy('date', 'asc');

                $imports = $imports->select(DB::raw('SUM(i_total) as nhaphang'), DB::raw('MONTH(imports.created_at) as date'))
                    ->whereYear('imports.created_at', '=', Carbon::now()->year)
                    ->groupBy('date')->orderBy('date', 'asc');

                break;
            case 'month':
            default:
                $orders = $orders->select(DB::raw('SUM(total) as doanhthu'), DB::raw('DAY(orders.created_at) as date'))
                    ->whereMonth('orders.created_at', '=', Carbon::now()->month)
                    ->groupBy('date')->orderBy('date', 'asc');

                $imports = $imports->select(DB::raw('SUM(i_total) as nhaphang'), DB::raw('DAY(imports.created_at) as date'))
                    ->whereMonth('imports.created_at', '=', Carbon::now()->month)
                    ->groupBy('date')->orderBy('date', 'asc');
                break;
        }
        $doanhthu = $orders->get()->toArray();
        $nhaphang = $imports->get()->toArray();

        $date = [];
        if ($condition == 'year') {
            for ($i = 1; $i <= 12; $i++) {
                $date[$i] = [
                    'doanhthu' => 0,
                    'nhaphang' => 0,
                    'date' => 'Tháng ' . $i
                ];
            }
        } else {
            for ($i = 1; $i <= Carbon::now()->daysInMonth; $i++) {
                $date[$i] = [
                    'doanhthu' => 0,
                    'nhaphang' => 0,
                    'date' => $i
                ];
            }
        }

        foreach ($doanhthu as $item) {
            $date[$item['date']]['doanhthu'] = (int)$item['doanhthu'];
        }
        foreach ($nhaphang as $item) {
            $date[$item['date']]['nhaphang'] = (int)$item['nhaphang'];
        }
        return response()->json([
            'data' => array_values($date),
            'status' => 200
        ]);
    }

    public function userAndOrder(Request $request)
    {
        $condition = $request->period;

        $orders = Order::where('status', '<>', 0);
        $users = new User();
        switch ($condition) {
            case 'year':
                $orders = $orders->select(DB::raw('COUNT(id) as quantity'), DB::raw('MONTH(orders.created_at) as date'))
                    ->whereYear('orders.created_at', '=', Carbon::now()->year)
                    ->groupBy('date')->orderBy('date', 'asc');

                $users = $users->select(DB::raw('COUNT(id) as user'), DB::raw('MONTH(users.created_at) as date'))
                    ->whereYear('users.created_at', '=', Carbon::now()->year)
                    ->groupBy('date')->orderBy('date', 'asc');

                break;
            case 'month':
            default:
                $orders = $orders->select(DB::raw('COUNT(id) as quantity'), DB::raw('DAY(orders.created_at) as date'))
                    ->whereMonth('orders.created_at', '=', Carbon::now()->month)
                    ->groupBy('date')->orderBy('date', 'asc');

                $users = $users->select(DB::raw('COUNT(id) as user'), DB::raw('DAY(users.created_at) as date'))
                    ->whereMonth('users.created_at', '=', Carbon::now()->month)
                    ->groupBy('date')->orderBy('date', 'asc');
                break;
        }
        $order = $orders->get()->toArray();
        $user = $users->get()->toArray();
        $date = [];
        if ($condition == 'year') {
            for ($i = 1; $i <= 12; $i++) {
                $date[$i] = [
                    'order' => 0,
                    'user' => 0,
                    'date' => 'Tháng ' . $i
                ];
            }
        } else {
            for ($i = 1; $i <= Carbon::now()->daysInMonth; $i++) {
                $date[$i] = [
                    'order' => 0,
                    'user' => 0,
                    'date' => $i
                ];
            }
        }

        foreach ($order as $item) {
            $date[$item['date']]['order'] = (int)$item['quantity'];
        }

        foreach ($user as $item) {
            $date[$item['date']]['user'] = (int)$item['user'];
        }
        return response()->json([
            'data' => array_values($date),
            'status' => 200
        ]);
    }
}
