<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

const LOCATION_NOW = "Asia/Ho_Chi_Minh";
const INPUT_PHONE = 'Vui lòng nhập số điện thoại';
const MESSAGE_SUCCESS = 'Thao tác thành công';
const MESSAGE_ERROR = 'Thao tác thất bại';

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
            'phone.required' => INPUT_PHONE,
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ]);
        $user = User::find(Session()->get('user')->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->updated_at = Carbon::now(LOCATION_NOW);
        $user->save();
        return redirect()->back()->with('success', MESSAGE_SUCCESS);
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
            $user->updated_at = Carbon::now(LOCATION_NOW);
            $user->save();
            return redirect()->route('client.user.index')->with('success', MESSAGE_SUCCESS);
        } else {
            return redirect()->route('client.user.index')->with('error', MESSAGE_ERROR);
        }
    }

    public function address()
    {
        $id = Session()->get('user')->id;
        $address = Address::where('user_id', $id)
            ->get();
        return view('client.user.address.index', compact('address'));
    }

    public function addAddress()
    {
        return view('client.user.address.create', ['address' => []]);
    }
    public function addAddressPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|size:10',
            'address' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập họ tên',
            'phone.required' => INPUT_PHONE,
            'phone.size' => 'Số điện thoại không hợp lệ',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ]);
        $address = new Address();
        $address->user_id = Session()->get('user')->id;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->type = $request->type;
        if ($request->default == "on") {
            Address::where('user_id', Session()->get('user')->id)
                ->update(['default' => 0]);
            $address->default = 1;
        }
        $address->created_at = Carbon::now(LOCATION_NOW);
        $address->save();
        return redirect()->route('client.address')->with('success', MESSAGE_SUCCESS);
    }
    public function editAddress($id)
    {
        $address = Address::find($id);
        return view('client.user.address.create', compact('address'));
    }
    public function updateAddress(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|size:10',
            'address' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập họ tên',
            'phone.required' => INPUT_PHONE,
            'phone.size' => 'Số điện thoại không hợp lệ',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ]);
        $address = Address::find($id);
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->type = $request->type;
        if ($request->default == "on") {
            Address::where('user_id', Session()->get('user')->id)
                ->update(['default' => 0]);
            $address->default = 1;
        }
        $address->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $address->save();
        return redirect()->route('client.address')->with('success', MESSAGE_SUCCESS);
    }
    public function setDefault($id)
    {
        Address::where('user_id', Session()->get('user')->id)
            ->update(['default' => 0]);

        $address = Address::find($id);
        $address->default = 1;
        $address->save();
        return redirect()->route('client.address')->with('success',  MESSAGE_SUCCESS);
    }

    public function deleteAddress($id)
    {
        Address::find($id)->delete();
        return redirect()->route('client.address')->with('success',  MESSAGE_SUCCESS);
    }

    public function notification()
    {
        Notification::where('user_id', Session()->get('user')->id)
            ->where('is_admin', 0)
            ->update(['is_read' => 1]);

        $type = request()->type;
        $notification = Notification::where('user_id', Session()->get('user')->id);
        switch ($type) {
            case 'order':
                $notification = $notification->where('type', 'Order');
                break;
            case 'voucher':
                $notification = $notification->where('type', 'Voucher');
                break;
            case 'system':
                $notification = $notification->where('type', 'System');
                break;
            default:
        }
        $notifications = $notification->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'notifications' => $notifications,
        ];
        return view('client.user.notification', $data);
    }

    public function deleteNotification()
    {
        try {
            DB::beginTransaction();
            Notification::find(request()->id)->delete();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Xóa thành công',
            ], 200);
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Xóa thất bại',
            ], 500);
        }
    }
}
