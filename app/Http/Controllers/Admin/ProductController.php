<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $brandRepository;
    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }
    public function index()
    {
        $brands = $this->brandRepository->getAll();
        $categories = $this->categoryRepository->getAll();
        $products = $this->productRepository->getAll();
        return view('admin.product.index');
    }
    public function addGroup(Request $request)
    {
        if ($request->ajax()) {
            $result = Groups::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);
            if ($result) {
                return response()->json(['status' => true, 'message' => 'Thêm thành công']);
            }
            return response()->json(['status' => false, 'message' => 'Thêm thất bại']);
        }
    }
    public function getGroup(Request $request)
    {
        if ($request->ajax()) {
            $result = Groups::where('active', 1)->get();
            return [
                'data' => $result
            ];
        }
    }
}