<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Address;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

const INPUT_PASSWORD = 'Nhập mật khẩu';

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Nhập thông tin đăng nhập',
            'password.required' =>  INPUT_PASSWORD,
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
            'password.required' => INPUT_PASSWORD,
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
        return redirect()->route('client.home')->with('success', 'Đăng ký thành công');
    }

    public function showForgetPasswordForm()
    {
        return view('client.user.forgot-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users',
            ],
            [
                'email.required' => 'Nhập email',
                'email.email' => 'Email không đúng định dạng',
                'email.exists' => 'Email không tồn tại',
            ]
        );
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('client.user.email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('client.user.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6',
            're-password' => 'required|same:password',
        ], [
            'email.required' => 'Nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email không tồn tại',
            'password.required' => INPUT_PASSWORD,
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            're-password.required' => 'Nhập lại mật khẩu',
            're-password.same' => 'Mật khẩu không khớp'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();
        if (!$updatePassword) {
            return redirect()->back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('client.login')->with('success', 'Mật khẩu đã được thay đổi');
    }
}
