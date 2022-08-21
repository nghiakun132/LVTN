<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
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
        $categories = $this->categoryRepository->getAll();
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
        $this->categoryRepository->create($data);
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }
}