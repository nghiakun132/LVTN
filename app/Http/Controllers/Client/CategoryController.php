<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Groups;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected function sortAndFilter($sort, $products)
    {
        if (isset($sort)) {
            switch ($sort) {
                case 'price_asc':
                    $products = $products->orderBy('pro_price', 'asc');
                    break;
                case 'price_desc':
                    $products = $products->orderBy('pro_price', 'desc');
                    break;
                case 'name_asc':
                    $products = $products->orderBy('pro_name', 'asc');
                    break;
                case 'name_desc':
                    $products = $products->orderBy('pro_name', 'desc');
                    break;
                case 'new':
                    $products = $products->orderBy('pro_id', 'desc');
                    break;
                case 'old':
                    $products = $products->orderBy('pro_id', 'asc');
                    break;
                case 'view':
                    $products = $products->orderBy('pro_view', 'desc');
                    break;
                default:
                    $products = $products->orderBy('pro_price', 'asc');
                    break;
            }
        }
        return $products;
    }

    public function index(Request $request, $slug)
    {
        try {
            $category = Category::where('c_slug', $slug)->where('c_status', 1)->first();

            $brands = Brands::where('b_category_id', $category->c_id)
                ->where('b_status', 1)
                ->get();
            $products = Product::where('pro_category_id', $category->c_id)
                ->whereIn('pro_brand_id', $brands->pluck('b_id'))
                ->where('pro_active', 1)
                ->with([
                    'comments' => function ($query) {
                        $query->where('parent_id', 0);
                    },
                    'sales' => function ($query) {
                        $query->with([
                            'sales' => function ($query2) {
                                $query2->withTrashed();
                            },

                        ]);
                    },
                ]);

            if (Category::where('parent_id', $category->c_id)->where('c_status', 1)->count() > 0) {
                $categories = Category::where('parent_id', $category->c_id)->where('c_status', 1)->get();
                $products = Product::whereIn('pro_category_id', $categories->pluck('c_id'))
                    ->where('pro_active', 1)
                    ->with([
                        'comments' => function ($query) {
                            $query->where('parent_id', 0);
                        },
                        'sales' => function ($query) {
                            $query->with([
                                'sales' => function ($query2) {
                                    $query2->withTrashed();
                                },

                            ]);
                        },
                    ]);
            }

            $giaTu = $request->gia_tu;
            $giaDen = $request->gia_den;
            $sort = $request->sort;
            if (isset($giaTu) && isset($giaDen)) {
                $products = $products->where('pro_price', '>=', $giaTu)
                    ->where('pro_price', '<=', $giaDen);
            }

            $products = $this->sortAndFilter($sort, $products);

            $products = $products->paginate(15);

            $data = [
                'products' => $products,
                'brands' => $brands,
                'category' => $category
            ];

            return view('client.category.index', $data);
        } catch (\Exception $exception) {
            return view('errors.404');
        }
    }

    public function brand(Request $request, $categorySlug, $brandSlug)
    {
        try {
            $category = Category::where('c_slug', $categorySlug)->where('c_status', 1)->first();
            $brands = Brands::where('b_category_id', $category->c_id)->where('b_status', 1)->get();
            $brand = Brands::where('b_slug', $brandSlug)
                ->where('b_category_id', $category->c_id)->where('b_status', 1)
                ->first();
            $products = Product::where('pro_brand_id', $brand->b_id)
                ->where('pro_active', 1)
                ->with([
                    'comments' => function ($query) {
                        $query->where('parent_id', 0);
                    },
                    'sales' => function ($query) {
                        $query->with([
                            'sales' => function ($query2) {
                                $query2->withTrashed();
                            }
                        ]);
                    }
                ]);
            $giaTu = $request->gia_tu;
            $giaDen = $request->gia_den;
            $sort = $request->sort;
            if (isset($giaTu) && isset($giaDen)) {
                $products = $products
                    ->where('pro_price', '>=', $giaTu)
                    ->where('pro_price', '<=', $giaDen);
            }

            $products = $this->sortAndFilter($sort, $products);

            $products = $products->paginate(15);

            $data = [
                'products' => $products,
                'brands' => $brands,
                'brand' => $brand,
                'category' => $category
            ];

            return view('client.category.brand', $data);
        } catch (\Exception $exception) {
            return view('errors.404');
        }
    }
    public function group(Request $request, $categorySlug, $brandSlug, $groupSlug)
    {
        try {
            $category = Category::where('c_slug', $categorySlug)->where('c_status', 1)->first();
            $brands = Brands::where('b_category_id', $category->c_id)->where('b_status', 1)->get();
            $brand = Brands::where('b_slug', $brandSlug)->where('b_status', 1)->first();
            $group = Groups::where('slug', $groupSlug)->first();
            $products = Product::where('pro_category_id', $category->c_id)
                ->where('pro_active', 1)
                ->where('pro_brand_id', $brand->b_id)
                ->where('group_id', $group->group_id)
                ->with([
                    'sales' => function ($query) {
                        $query->with(
                            ['sales' => function ($query2) {
                                $query2->withTrashed();
                            }]
                        );
                    }
                ]);
            $giaTu = $request->gia_tu;
            $giaDen = $request->gia_den;
            $sort = $request->sort;
            if (isset($giaTu) && isset($giaDen)) {
                $products = Product::where('pro_category_id', $category->c_id)
                    ->where('pro_active', 1)
                    ->where('pro_brand_id', $brand->b_id)
                    ->where('pro_price', '>=', $giaTu)
                    ->where('pro_price', '<=', $giaDen)
                    ->where('group_id', $group->group_id)
                    ->with([
                        'sales' => function ($query) {
                            $query->with(
                                ['sales' => function ($query2) {
                                    $query2->withTrashed();
                                }]
                            );
                        }
                    ]);
            }

            $products = $this->sortAndFilter($sort, $products);

            $products = $products->paginate(15);

            $data = [
                'products' => $products,
                'brands' => $brands,
                'brand' => $brand,
                'category' => $category,
                'group' => $group
            ];
            return view('client.category.group', $data);
        } catch (\Exception $exception) {
            return view('errors.404');
        }
    }
}
