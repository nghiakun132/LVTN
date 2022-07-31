<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        dd($request->all());
    }
}