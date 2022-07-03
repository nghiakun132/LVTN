<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Admin::where('isDelete', 0)->get();
        $data = [
            'staffs' => $staffs,
        ];
        return view('admin.staff.index', $data);
    }
    public  function store(Staff $request)
    {
        $staff = new Admin();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password = Hash::make($request->password);
        $staff->dob = $request->dob;
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->level = $request->level;
        $staff->save();
        return redirect()->route('admin.staff.index')->with('success', 'Thêm nhân viên thành công');
    }
}