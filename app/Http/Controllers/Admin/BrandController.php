<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Category;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    protected $brandRepository;
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository, BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $brands = $this->brandRepository->getWithRelationship([
            'category' => function ($query) {
                $query->select('c_id', 'c_name');
            }
        ]);
        $categories = $this->categoryRepository->getAll();
        $data  = [
            'brands'  => $brands,
            'categories' => $categories,

        ];
        return view('admin.brand.index', $data);
    }

    public function store(BrandRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'b_name' => $request->b_name,
                'b_category_id' => $request->b_category_id,
                'b_slug' => Str::slug($request->b_name),
            ];
            if ($request->file('b_banner')) {
                $file = $request->file('b_banner');
                $name = $file->getClientOriginalName();
                $file->move('images/brands', $name);
                $data['b_banner'] = $name;
            }
            $this->brandRepository->create($data);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm thương hiệu thành công');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Thêm thất bại' . $th->getMessage());
        }
    }

    public function show($id)
    {
        $brand = $this->brandRepository->findOne($id);
        $categories = $this->categoryRepository->getAll();
        $data = [
            'brand' => $brand,
            'categories' => $categories,
        ];
        return view('admin.brand.show', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'b_name' => 'required|',
                'b_category_id' => 'required|unique:brands,b_category_id,' . $id . ',b_id',
            ],
            [
                'b_name.required' => 'Tên danh mục không được để trống',
                'b_category_id.required' => 'Danh mục không được để trống',
            ]
        );
        try {
            DB::beginTransaction();
            $data = [];
            $data['b_name'] = $request->b_name;
            $data['b_slug'] = Str::slug($request->b_name);
            $data['b_category_id'] = $request->b_category_id;
            if ($request->file('c_banner')) {
                $file = $request->file('c_banner');
                $fileName = $file->getClientOriginalName();
                $file->move('images/brands', $fileName);
                $data['b_banner'] = $fileName;
            }
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result  = $this->brandRepository->update($data, $id);
            if (!$result) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Cập nhật thất bại');
            }
            DB::commit();
            return redirect()->route('admin.brand.index')->with('success', 'Cập nhật thành công');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $result = $this->brandRepository->delete($id);
            if (!$result) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Xóa thất bại');
            }
            DB::commit();
            return redirect()->route('admin.brand.index')->with('success', 'Xóa thành công');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function changeStatus($id)
    {
        $brand = $this->brandRepository->findOne($id);
        $brand->b_status = !$brand->b_status;
        $brand->save();
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
    public function getBrand(Request $request)
    {
        if ($request->ajax()) {
            $arr = [
                'b_category_id' => $request->category,
            ];
            $brands = $this->brandRepository->getBrand($arr);
            $html = '';
            foreach ($brands as $brand) {
                $html .= '<option value="' . $brand->b_id . '">' . $brand->b_name . '</option>';
            }
            return $html;
        }
    }
}