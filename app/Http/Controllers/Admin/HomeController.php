<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Google\Service\Analytics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $period = isset($request->period) ? $request->period : 'week';
        $orders = Order::where('status', '<>', 0);
        $ordersLatest = $orders->orderBy('created_at', 'desc')
            ->with('user:id,name')
            ->limit(10)->get();
        $ordersBefore = Order::where('status', '<>', 0);

        $users = User::limit(10)->get();

        $data = [
            'period' => $period,
            'ordersLatest' => $ordersLatest,
            'users' => $users
        ];
        return view('admin.dashboard', $data);
    }
    public function login()
    {
        $email = Cookie::get('email');
        return view('admin.login', compact('email'));
    }
    public function loginPost(AdminRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $admin = Admin::where('email', $email)->first();
        if ($admin) {
            if (Hash::check($password, $admin->password)) {
                $request->session()->put('admin', $admin);
                if ($request->remember = 'on') {
                    Cookie::queue('email', $admin->email, 60 * 24 * 1);
                }
                return redirect()->route('admin.home');
            } else {
                return redirect()->back()->with('error', 'Mật khẩu không đúng');
            }
        } else {
            return redirect()->back()->with('error', 'Email không tồn tại');
        }
    }
    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('admin.login');
    }
}
