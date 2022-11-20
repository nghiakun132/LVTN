<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Imports\ProductImport;
use App\Models\Groups;
use App\Models\Images;
use App\Models\import_details;
use App\Models\sales_products;
use App\Repositories\CategoryRepository;
use App\Repositories\ImportRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SaleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

const MESSAGE_SUCCESS = 'Thao tác thành công';
const MESSAGE_ERROR = 'Thao tác thất bại';

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
                $query->withTrashed();
                $query->select('c_id', 'c_name');
            },
            'brand' => function ($query) {
                $query->withTrashed();
                $query->select('b_id', 'b_name');
            },
            'group' => function ($query) {
                $query->withTrashed();
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
        $imports = $this->importRepository->whereGetAll([
            'i_status' => 1,
        ]);
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
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                $importDetail = new import_details();
                $importDetail->import_id = $import;
                $importDetail->product_id = $product;
                $importDetail->quantity = $request->pro_quantity;
                $importDetail->price = $request->pro_price;
                $importDetail->save();
            } else {
                $importDetail = new import_details();
                $importDetail->import_id = $request->import_id;
                $importDetail->product_id = $product;
                $importDetail->quantity = $request->pro_quantity;
                $importDetail->price = $request->pro_price;
                $importDetail->save();
            }

            DB::commit();
            return redirect()->route('admin.product.index')->with('success', MESSAGE_SUCCESS);
        } catch (\Exception $exception) {
            DB::rollBack();
            report($exception);
            return redirect()->back()->with('error', MESSAGE_ERROR);
        }
    }

    public function show($id)
    {
        $product = $this->productRepository->findOneWithRelationship([
            'category' => function ($query) {
                $query->withTrashed();
                $query->select('c_id', 'c_name');
            },
            'brand' => function ($query) {
                $query->withTrashed();
                $query->select('b_id', 'b_name');
            },
            'group' => function ($query) {
                $query->withTrashed();
                $query->select('group_id', 'name', 'slug');
            },
        ], $id);
        return view('admin.product.show', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', 'pro_avatar', 'pro_quantity');
        $data['pro_slug'] = Str::slug($request->pro_name);
        try {
            DB::beginTransaction();
            $this->productRepository->update($data, $id);
            DB::commit();
            return redirect()->route('admin.product.index')->with('success', MESSAGE_SUCCESS);
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
            return redirect()->back()->with('success', MESSAGE_SUCCESS);
        }
        return redirect()->back()->with('error', MESSAGE_ERROR);
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
                $query->withTrashed();
                $query->select('c_id', 'c_name');
            },
            'brand' => function ($query) {
                $query->withTrashed();
                $query->select('b_id', 'b_name');
            },
            'group' => function ($query) {
                $query->withTrashed();
                $query->select('group_id', 'name', 'slug');
            },
            'images' => function ($query) {
                $query->select('product_id', 'path');
            }
        ], $id);
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


    public function addGroup(Request $request)
    {
        if ($request->ajax()) {
            $result = Groups::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);
            if ($result) {
                return response()->json(['status' => true, 'message' => MESSAGE_SUCCESS], 200);
            }
            return response()->json(['status' => false, 'message' => MESSAGE_ERROR], 200);
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
            'sales' => function ($query) {
                $query->withTrashed();
            }
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
            return redirect()->back()->with('success', MESSAGE_SUCCESS);
        }
        return redirect()->back()->with('error', MESSAGE_ERROR);
    }
    public function deleteSales($id)
    {
        $saleProduct = sales_products::find($id);
        if ($saleProduct) {
            $saleProduct->delete();
            return redirect()->back()->with('success', MESSAGE_SUCCESS);
        }
        return redirect()->back()->with('error', MESSAGE_ERROR);
    }

    public function addImg(Request $request, $id)
    {
        if ($request->file('pro_avatar')) {
            $file = $request->file('pro_avatar');
            $fileName = $this->productRepository->uploadFile($file, 'products');
            $data['pro_avatar'] = $fileName;
            $this->productRepository->update($data, $id);
        }
        return redirect()->back()->with('success', MESSAGE_SUCCESS);
    }

    public function import(Request $request)
    {
        try {
            DB::beginTransaction();
            if ($request->file('file')) {
                Excel::import(new ProductImport, $request->file('file'));
            }
            DB::commit();
            return redirect()->back()->with('success', MESSAGE_SUCCESS);
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function export()
    {
        $fileName = 'product' . date('YmdHis') . '.xlsx';
        return Excel::download(new ProductExport, $fileName);
    }
}
