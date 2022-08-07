<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
        $address->phone = $request->phone;
        $address->name = $request->name;
        $address->save();

        return redirect()->route('client.home')->with('success', 'Đăng ký thành công');
    }
    public function logout()
    {
        Session()->forget('user');
        return redirect()->route('client.home');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {
        $users = Socialite::driver('google')->user();
        $check = User::where('email', $users->email)->first();
        if ($check) {
            Session()->put('user', $check);
            return redirect()->route('client.home');
        } else {
            $data = [
                'email' => $users->email,
                'name' => $users->name,
                'avatar' => $users->avatar,
            ];
            Session()->put('temp_user', $data);
            return redirect()->route('client.verify.account');
        }
    }
    public function loginUser()
    {
        return view('client.user.login');
    }
    public function verifyAccount()
    {
        return view('client.user.verify-account');
    }
    public function verifyAccountPost(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'confirmed' => 'required|same:password',
        ], [
            'address.required' => 'Nhập địa chỉ',
            'phone.required' => 'Nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Nhập mật khẩu',
            'confirmed.required' => 'Nhập lại mật khẩu',
            'confirmed.same' => 'Mật khẩu không khớp'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone =  $request->phone;
        $user->avatar = Session()->get('temp_user')['avatar'];
        $user->type = 2;
        $user->save();

        $address = new Address();
        $address->user_id = $user->id;
        $address->address = $request->address;
        $address->phone = $request->phone;
        $address->name = $request->name;
        $address->save();

        Session()->forget('temp_user');
        Session()->put('user', $user);
        return redirect()->route('client.home');
    }
}