<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff;
use App\Repositories\StaffRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    protected $staffRepository;

    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function index()
    {
        $staffs = $this->staffRepository->getAll();

        $data = [
            'staffs' => $staffs,
        ];
        return view('admin.staff.index', $data);
    }

    public  function store(Staff $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $staff = $this->staffRepository->create($data);
            if (!$staff) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Thêm nhân viên thất bại');
            }
            DB::commit();
            return redirect()->route('admin.staff.index')->with('success', 'Thêm nhân viên thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Thêm nhân viên thất bại');
        }
    }

    public function show($id)
    {
        $staff = $this->staffRepository->findById($id);

        if (!$staff) {
            return redirect()->back()->with('error', 'Nhân viên không tồn tại');
        }
        $data = [
            'staff' => $staff,
        ];
        return view('admin.staff.show', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $request->id,
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->all();
            $staff = $this->staffRepository->update($data, $id);
            if (!$staff) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Cập nhật nhân viên thất bại');
            }
            DB::commit();
            return redirect()->route('admin.staff.index')->with('success', 'Cập nhật nhân viên thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Cập nhật nhân viên thất bại');
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $staff = $this->staffRepository->delete($id);
            if (!$staff) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Xóa nhân viên thất bại');
            }
            DB::commit();
            return redirect()->route('admin.staff.index')->with('success', 'Xóa nhân viên thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Xóa nhân viên thất bại');
        }
    }

    public function changeStatus($id)
    {
        $result = $this->staffRepository->changeStatus($id);
        if ($result) {
            return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật trạng thái thất bại');
    }
}
