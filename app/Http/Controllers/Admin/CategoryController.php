<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository  $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getWithRelationship([
            'parent' => function ($query) {
                $query->withTrashed();
            }
        ]);
        $arr = $categories->toArray();
        $child = $this->categoryRepository->show($arr, 0);
        $showSelect = $this->categoryRepository->showSelect($child, 0);
        $data = [
            'categories' => $categories,
            'showSelect' => $showSelect,
        ];
        return view('admin.category.index', $data);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'c_name' => 'required|',
            ],
            [
                'c_name.required' => 'Tên danh mục không được để trống',
            ]
        );

        try {
            DB::beginTransaction();
            $data = [];
            $data['c_name'] = $request->c_name;
            $data['c_slug'] = Str::slug($request->c_name);
            $data['parent_id'] = $request->parent_id;
            if ($request->file('c_banner')) {
                $file = $request->file('c_banner');
                $fileName = $this->categoryRepository->uploadFile($file, 'categories');
                $data['c_banner'] = $fileName;
            }
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->categoryRepository->create($data);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm mới thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $categories = $this->categoryRepository->getAll();
        $arr = $categories->toArray();
        $child = $this->categoryRepository->show($arr, 0);
        $showSelect = $this->categoryRepository->showSelect($child, 0);

        $category = $this->categoryRepository->findById($id);

        $data = [
            'category' => $category,
            'showSelect' => $showSelect,
        ];
        return view('admin.category.show', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'c_name' => 'required|',
            ],
            [
                'c_name.required' => 'Tên danh mục không được để trống',
            ]
        );
        try {
            DB::beginTransaction();
            $data = [];
            $data['c_name'] = $request->c_name;
            $data['c_slug'] = Str::slug($request->c_name);
            $data['parent_id'] = $request->parent_id;
            if ($request->file('c_banner')) {
                $file = $request->file('c_banner');
                $fileName = $file->getClientOriginalName();
                $file->move('images/categories', $fileName);
                $data['c_banner'] = $fileName;
            }
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result  = $this->categoryRepository->update($data, $id);
            if (!$result) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Cập nhật thất bại');
            }
            DB::commit();
            return redirect()->route('admin.category.index')->with('success', 'Cập nhật thành công');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $this->categoryRepository->delete($id);
            DB::commit();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function changeStatus($id)
    {
        $category = $this->categoryRepository->findOne($id);
        $category->c_status = !$category->c_status;
        $category->save();
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }
}
