<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Repositories\Supplier\SupplierRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    protected $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function index()
    {
        $suppliers = $this->supplierRepository->getAll();
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function store(SupplierRequest $request)
    {
        $data = [
            's_name' => $request->s_name ?? '',
            's_address' => $request->s_address ?? '',
            's_phone' => $request->s_phone ?? '',
            's_email' => $request->s_email ?? '',
        ];
        try {
            DB::beginTransaction();
            $this->supplierRepository->create($data);
            DB::commit();
            if ($request->ajax()) {
                return response()->json([
                    'status' => true,
                    'message' => 'success'
                ], 200);
            }
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function show($id)
    {
        $supplier = $this->supplierRepository->findOne($id);
        return view('admin.supplier.show', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            's_name' => $request->s_name ?? '',
            's_address' => $request->s_address ?? '',
            's_phone' => $request->s_phone ?? '',
            's_email' => $request->s_email ?? '',
        ];
        try {
            DB::beginTransaction();
            $update = $this->supplierRepository->update($data, $id);
            if (!$update) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Cập nhật thất bại');
            }
            DB::commit();
            return redirect()->route('admin.supplier.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $delete = $this->supplierRepository->delete($id);
            if (!$delete) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Xóa thất bại');
            }
            DB::commit();
            return redirect()->route('admin.supplier.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($id)
    {
        $supplier = $this->supplierRepository->findOne($id);
        if ($supplier) {
            $supplier->s_status = !$supplier->s_status;
            $supplier->save();
            return redirect()->back();
        }
        return redirect()->back()->with('error', 'Không tìm thấy nhà cung cấp');
    }
}