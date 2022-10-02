<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index($category, $brand, $product)
    {
        try {
            $category = Category::where('c_slug', $category)->first();
            $brand = Brands::where('b_slug', $brand)->first();
            $product = Product::where('pro_slug', $product)
                ->with([
                    'sales' => function ($query) {
                        $query->with([
                            'sales'
                        ]);
                    },
                    'event_details' => function ($query) {
                        $query->with([
                            'events'
                        ]);
                    },
                    'brand',
                    'category',
                    'group'
                ])
                ->first();
            // dd($product);
            $stars = Comment::where('product_id', $product->pro_id)->where('parent_id', 0)->avg('star');
            $comment = Comment::where('product_id', $product->pro_id)
                ->where('parent_id', 0)
                ->where('status', 1)
                ->with([
                    'user' => function ($query) {
                        $query->select('id', 'name', 'avatar', 'type');
                    },
                    'replies' => function ($query) {
                        $query->where('status', 1)
                            ->with([
                                'user'
                            ]);
                    },
                    'parent' => function ($query) {
                        $query->where('status', 0)
                            ->with([
                                'user'
                            ]);
                    }
                ])
                ->paginate(10);

            $watched = json_decode(Cookie::get('watched'));
            if ($watched) {
                if (!in_array($product->pro_id, $watched)) {
                    array_push($watched, $product->pro_id);
                    Cookie::queue('watched', json_encode($watched), 60 * 24 * 3);
                }
            } else {
                $watched = [];
                array_push($watched, $product->pro_id);
                Cookie::queue('watched', json_encode($watched), 60 * 24 * 3);
            }
            $images = $product->images;
            $data = [
                'product' => $product,
                'images' => $images,
                'category' => $category,
                'brand' => $brand,
                // 'tt' => $tt,
                'comments' => $comment,
                'stars' => $stars,

            ];
            $product->pro_view = $product->pro_view + 1;
            $product->save();
            return view('client.detail.index', $data);
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }

    public function watched(Request $request)
    {
        try {
            $watched = Cookie::get('watched');
            if (!empty($watched)) {
                $products = Product::whereIn('pro_id', json_decode($watched))
                    ->with([
                        'sales' => function ($query) {
                            $query->with([
                                'sales'
                            ]);
                        },
                        'brand',
                        'category',
                        'group'
                    ])->paginate(12);
                $data = [
                    'products' => $products
                ];
                return view('client.detail.watched', $data);
            } else {
                $data = [
                    'products' => []
                ];
                return view('client.detail.watched', $data);
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }

    public function comment(Request $request, $category, $brand, $slug)
    {
        $product = Product::where('pro_slug', $slug)->first();
        if ($request->ajax()) {
            $data = $request->all();
            $comment = new Comment();
            $comment->user_id = session()->get('user')->id;
            $comment->product_id = $product->pro_id;
            $comment->star = $data['rating'] ?? 0;
            $comment->content = $data['content'];
            $comment->parent_id = $data['parent_id'] ?? 0;
            $comment->status = 0;
            $comment->save();
            return response()->json([
                'code' => 200,
                'data' => $comment
            ], 200);
        }
    }
}