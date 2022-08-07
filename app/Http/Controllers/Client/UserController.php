<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Session()->get('user');

        $data = [
            'user' => $user,
        ];
        return view('client.user.index', $data);
    }
    public function changeInformation(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Session()->get('user')->id,
            'phone' => 'required|unique:users,phone,' . Session()->get('user')->id,
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ]);
        $user = User::find(Session()->get('user')->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $user->save();
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|',
            'new_password' => 'required|min:6|max:20',
            'renew_password' => 'required|same:new_password',
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu cũ',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'new_password.max' => 'Mật khẩu phải có nhiều nhất 20 ký tự',
            'renew_password.required' => 'Vui lòng nhập lại mật khẩu mới',
            'renew_password.same' => 'Mật khẩu nhập lại không khớp',
        ]);

        $user = User::where('id', Session()->get('user')->id)->first();

        if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
            $user->save();
            return redirect()->route('client.user.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('client.user.index')->with('error', 'Mật khẩu cũ không đúng');
        }
    }
    public function address()
    {
        $id = Session()->get('user')->id;
        $address = Address::join('users', 'users.id', '=', 'address.user_id')
            ->where('users.id', $id)
            ->select('address.*', 'users.name')
            ->get();
        return view('client.user.address', compact('address'));
    }
}