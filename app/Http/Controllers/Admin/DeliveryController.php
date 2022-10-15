<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Delivery\DeliveryRepository;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    protected $deliveryRepository;
    public function __construct(DeliveryRepository $deliveryRepository)
    {
        $this->deliveryRepository = $deliveryRepository;
    }

    public function index()
    {
        try {
            $data = [
                'deliveries' => $this->deliveryRepository->getAll()
            ];
            return view('admin.delivery.index', $data);
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'code' => 'required|unique:delivery_agents,code',
                'fee' => 'required|numeric',
            ], [
                'name.required' => 'Tên không được để trống',
                'code.required' => 'Mã không được để trống',
                'code.unique' => 'Mã đã tồn tại',
                'fee.required' => 'Phí không được để trống',
                'fee.numeric' => 'Phí phải là số',
            ]);
            $this->deliveryRepository->create($request->all());
            return redirect()->back()->with('success', 'Thêm mới thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'delivery' => $this->deliveryRepository->findById($id)
            ];
            return view('admin.delivery.edit', $data);
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required|unique:delivery_agents,code,' . $id,
            'fee' => 'required|numeric',
        ], [
            'name.required' => 'Tên không được để trống',
            'code.required' => 'Mã không được để trống',
            'code.unique' => 'Mã đã tồn tại',
            'fee.required' => 'Phí không được để trống',
            'fee.numeric' => 'Phí phải là số',
        ]);
        $this->deliveryRepository->update($request->all(), $id);
        return redirect()->route('admin.delivery.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        try {
            $this->deliveryRepository->delete($id);
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
