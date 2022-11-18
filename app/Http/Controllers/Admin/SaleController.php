<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sales_products;
use App\Repositories\ProductRepository;
use App\Repositories\SaleRepository;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $salesRepository;
    protected $productRepository;
    public function __construct(
        SaleRepository $salesRepository,
        ProductRepository $productRepository
    ) {
        $this->salesRepository = $salesRepository;
        $this->productRepository = $productRepository;
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

    public function addProduct($id)
    {
        $sale = $this->salesRepository->findWithRelationship(['sale'], $id);
        $productInSale = $sale->sale->pluck('product_id')->toArray();

        $products = $this->productRepository->findWhereIn('pro_id', $productInSale);
        $productsNotIn = $this->productRepository->whereNotIn('pro_id', $productInSale);
        $data = [
            'sale' => $sale,
            'products' => $products,
            'productsNotIn' => $productsNotIn
        ];
        return view('admin.sale.add_product', $data);
    }

    public function addProductPost(Request $request, $id)
    {
        $sale = $this->salesRepository->findWithRelationship(['sale'], $id);

        foreach ($request->product_id as $key => $value) {
            $data = [
                'sale_id' => $id,
                'product_id' => $value
            ];
            $sale->sale()->create($data);
        }
        return redirect()->back()->with('success', 'Thêm sản phẩm thành công');
    }

    public function deleteProduct($id)
    {
        $delete = sales_products::where('product_id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
    }
}
