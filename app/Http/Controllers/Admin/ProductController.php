<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Imports\ProductImport;
use App\Models\Colors;
use App\Models\Groups;
use App\Models\Images;
use App\Models\import_details;
use App\Models\sales_products;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Import\ImportRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Sale\SaleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    protected $productRepository;
    protected $importRepository;
    protected $saleRepository;
    protected $categoryRepository;
    public function __construct(
        ProductRepository $productRepository,
        ImportRepository $importRepository,
        SaleRepository $saleRepository,
        CategoryRepository $categoryRepository

    ) {
        $this->productRepository = $productRepository;
        $this->importRepository = $importRepository;
        $this->saleRepository = $saleRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $products = $this->productRepository->getWithRelationship([
            'category' => function ($query) {
                $query->select('c_id', 'c_name');
            },
            'brand' => function ($query) {
                $query->select('b_id', 'b_name');
            },
            'group' => function ($query) {
                $query->select('group_id', 'name', 'slug');
            },
        ]);
        $data = [
            'products' => $products,
        ];
        return view('admin.product.index', $data);
    }
    public function create()
    {
        $imports = $this->importRepository->getAll();
        $categories = $this->categoryRepository->getWithRelationship([
            'parent'
        ]);
        $arr = $categories->toArray();
        $child = $this->categoryRepository->show($arr, 0);
        $showSelect = $this->categoryRepository->showSelect($child, 0);
        $data = [
            'showSelect' => $showSelect,
            'imports' => $imports,
        ];
        return view('admin.product.create', $data);
    }

    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        $data = $request->except('_token', 'pro_avatar', 'import_id');
        $data['pro_slug'] = Str::slug($request->pro_name);

        try {
            if ($request->file('pro_avatar')) {
                $file = $request->file('pro_avatar');
                $fileName = $this->productRepository->uploadFile($file, 'products');
                $data['pro_avatar'] = $fileName;
            }
            $product = $this->productRepository->insertGetId($data);
            if ($request->import_id == 0) {
                $import = $this->importRepository->insertGetId([
                    'i_code' => Str::random(10),
                    'i_admin_id' => session()->get('admin')->id,
                    'i_status' => 1,
                    'i_total' => $request->pro_price * $request->pro_quantity,
                ]);

                $importDetail = new import_details();
                $importDetail->import_id = $import;
                $importDetail->product_id = $product;
                $importDetail->quantity = $request->pro_quantity;
                $importDetail->price = $request->pro_price;
                $importDetail->save();
            }

            DB::commit();
            return redirect()->route('admin.product.index')->with('success', 'Thêm mới thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Thêm mới thất bại');
        }
    }

    public function show($id)
    {
        $product = $this->productRepository->findOneWithRelationship([
            'category' => function ($query) {
                $query->select('c_id', 'c_name');
            },
            'brand' => function ($query) {
                $query->select('b_id', 'b_name');
            },
            'group' => function ($query) {
                $query->select('group_id', 'name', 'slug');
            },
        ], $id);
        return view('admin.product.show', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // $data = [
        //     'pro_name' => $request->pro_name,
        //     'pro_slug' => Str::slug($request->pro_name),
        //     'pro_category_id' => $request->pro_category_id,
        //     'pro_brand_id' => $request->pro_brand_id,
        //     'pro_price' => $request->pro_price,
        //     'pro_sale' => $request->pro_sale,
        //     // 'pro_quantity' => $request->pro_quantity,
        //     'pro_content' => $request->pro_content,
        //     'pro_description' => $request->pro_description,
        //     'group_id' => $request->group_id,
        // ];

        $data = $request->except('_token', 'pro_avatar', 'pro_quantity');
        $data['pro_slug'] = Str::slug($request->pro_name);
        try {
            DB::beginTransaction();
            $product = $this->productRepository->findOne($id);
            if ($product->pro_quantity != $request->pro_quantity) {
                $data['pro_quantity'] = $product->pro_quantity + $request->pro_quantity;
                // $this->importRepository->create([
                //     'i_product_id' => $id,
                //     'i_price' => $request->pro_price,
                //     'i_quantity' => $request->pro_quantity,
                //     'i_status' => 1,
                // ]);
            }
            $this->productRepository->update($data, $id);
            DB::commit();
            return redirect()->route('admin.product.index')->with('success', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($id)
    {
        $product = $this->productRepository->findOne($id);
        if ($product) {
            $product->pro_active = !$product->pro_active;
            $product->save();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật thất bại');
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $product = $this->productRepository->findOne(
                $request->id,
            );
            if ($product) {
                $product->delete();
                return response()->json([
                    'code' => 200,
                    'message' => 'success',
                ], 200);
            }
            return response()->json([
                'code' => 500,
                'message' => 'error',
            ], 500);
        }
    }

    public function detail($id)
    {
        $product = $this->productRepository->findOneWithRelationship([
            'category' => function ($query) {
                $query->select('c_id', 'c_name');
            },
            'brand' => function ($query) {
                $query->select('b_id', 'b_name');
            },
            'group' => function ($query) {
                $query->select('group_id', 'name', 'slug');
            },
            'images' => function ($query) {
                $query->select('product_id', 'path');
            }
        ], $id);
        // $file = $product->pro_detail;
        $data = [];
        // if (!empty($file)) {
        //     $file = storage_path('app/public/products/' . $file);
        //     $data = Excel::toArray('', $file);
        //     $key = $data[0][0];
        //     $value = $data[0][1];
        //     $data = array_combine($key, $value);
        // }

        return view('admin.product.detail', compact('product'));
    }

    public function uploadImages(Request $request, $id)
    {
        if ($request->file('images')) {
            foreach ($request->file('images') as $file) {
                $fileName = $this->productRepository->uploadFile($file, 'products');
                $data = [
                    'path' => $fileName,
                    'product_id' => $id,
                ];
                Images::create($data);
            }
            return redirect()->back();
        }
    }

    // public function detailPost(Request $request, $id)
    // {
    //     $fileName = $this->productRepository->findOne($id)->pro_slug . '.xlsx';
    //     if ($request->file('file')) {
    //         $file = $request->file('file');
    //         $file->storeAs('public/products', $fileName);
    //         $this->productRepository->update(['pro_detail' => $fileName], $id);
    //         return redirect()->back()->with('success', 'Cập nhật thành công');
    //     }
    //     return redirect()->back()->with('error', 'Cập nhật thất bại');
    // }

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

    public function addSales($id)
    {
        $product = $this->productRepository->findOne($id);
        $sales = $this->saleRepository->getAll();
        $saleProduct = sales_products::where('product_id', $id)->with([
            'sales'
        ])->get();
        return view('admin.product.addSale', compact('sales', 'saleProduct', 'product'));
    }

    public function addSalesPost(Request $request, $id)
    {
        $saleId = $request->sale_id;
        if ($saleId) {

            foreach ($saleId as $item) {
                $saleProduct = sales_products::where('product_id', $id)->where('sale_id', $item)->first();
                if (!$saleProduct) {
                    sales_products::create([
                        'product_id' => $id,
                        'sale_id' => $item,
                    ]);
                }
            }
            return redirect()->back()->with('success', 'Thêm thành công');
        }
        return redirect()->back()->with('error', 'Thêm thất bại');
    }
    public function deleteSales($id)
    {
        $saleProduct = sales_products::find($id);
        if ($saleProduct) {
            $saleProduct->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        }
        return redirect()->back()->with('error', 'Xóa thất bại');
    }

    public function addImg(Request $request, $id)
    {
        if ($request->file('pro_avatar')) {
            $file = $request->file('pro_avatar');
            $fileName = $this->productRepository->uploadFile($file, 'products');
            $data['pro_avatar'] = $fileName;
            $this->productRepository->update($data, $id);
        }
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function import(Request $request)
    {
        try {
            DB::beginTransaction();
            if ($request->file('file')) {
                Excel::import(new ProductImport, $request->file('file'));
            }
            DB::commit();
            return redirect()->back()->with('success', 'Thêm thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function export()
    {
        $fileName = 'product' . date('YmdHis') . '.xlsx';
        return Excel::download(new ProductExport, $fileName);
    }
}
