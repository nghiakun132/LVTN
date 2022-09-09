<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Sale\SaleRepository;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $salesRepository;
    public function __construct(
        SaleRepository $salesRepository
    ) {
        $this->salesRepository = $salesRepository;
    }
    public function index()
    {
        $sales = $this->salesRepository->getAll();
        return view('admin.sale.index', compact('sales'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $this->salesRepository->create($data);
        return redirect()->route('admin.sale.index');
    }

    public function delete($id)
    {
        $delete = $this->salesRepository->delete($id);
        if ($delete) {
            return redirect()->back()->with('success', 'Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
    }

    public function changeStatus($id)
    {
        $sale = $this->salesRepository->findById($id);
        $sale->s_active =  !$sale->s_active;
        $sale->save();
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
}