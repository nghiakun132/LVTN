<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Nhập thông tin đăng nhập',
            'password.required' => 'Nhập mật khẩu'
        ]);
        $check = true;

        $user = User::where('email', $request->email)->first();

        if (!strpos($request->email, '@')) {
            $user = User::where('phone', $request->email)->first();
        }

        if (!$user) {
            $check = false;
        }

        if ($user && !Hash::check($request->password, $user->password)) {
            $check = false;
        }

        if (!$check) {
            return redirect()->back()->with('error', 'Thông tin đăng nhập không chính xác');
        }

        Session()->put('user', $user);
        return redirect()->route('client.home');
    }
    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone =  $request->phone;
        $user->type = 1;
        $user->save();

        $address = new Address();
        $address->user_id = $user->id;
        $address->address = $request->address;
        $address->save();

        return redirect()->route('client.home')->with('success', 'Đăng ký thành công');
    }
    public function logout()
    {
        Session()->forget('user');
        return redirect()->route('client.home');
    }
}