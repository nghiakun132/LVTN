<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private function relationship()
    {
        return [
            'sales' => function ($query) {
                $query->with([
                    'sales' => function ($query) {
                        $query->withTrashed();
                    }
                ]);
            },
            'brand' => function ($query) {
                $query->withTrashed();
            },
            'category' => function ($query) {
                $query->withTrashed();
            },
        ];
    }

    public function index()
    {
        try {
            $details = [];
            $end = '';
            $washingMachines = Product::where('pro_category_id', 9)
                ->where('pro_active', 1)
                ->with($this->relationship())->limit(12)->get();
            $televisions = Product::where('pro_category_id', 5)->with($this->relationship())
                ->where('pro_active', 1)
                ->orderBy('pro_view', 'DESC')
                ->limit(20)->get();
            $fridges = Product::where('pro_category_id', 10)->with($this->relationship())
                ->where('pro_active', 1)
                ->orderBy('pro_view', 'DESC')
                ->limit(20)->get();
            $liked = Product::with($this->relationship())
                ->where('pro_active', 1)
                ->orderBy('pro_view', 'DESC')
                ->limit(20)->get();
            $event = Events::where('status', 0)->first();
            if ($event) {
                $end = date('Y/m/d H:i:s', strtotime($event->end_date));
                $details = $event->event_details->load([
                    'products' => function ($query) {
                        $query->withTrashed();
                    },
                    'products.brand' => function ($query) {
                        $query->withTrashed();
                    },
                    'products.category' => function ($query) {
                        $query->withTrashed();
                    },
                ]);
            }
            $laptops = Product::where('pro_category_id', 1)
                ->where('pro_active', 1)
                ->with($this->relationship())
                ->orderBy('pro_view', 'DESC')->limit(20)->get();

            $data = [
                'liked' => $liked,
                'end' => $end,
                'details' => $details,
                'laptops' => $laptops,
                'fridges' => $fridges,
                'televisions' => $televisions,
                'washingMachines' => $washingMachines,
            ];
            return view('client.home.index', $data);
        } catch (\Exception $e) {
            report($e);
            return view('errors.404');
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $products = Product::where('pro_name', 'LIKE', '%' . $keyword . '%')
            ->where('pro_active', 1)
            ->with($this->relationship())
            ->orderBy('pro_id', 'DESC');
        $data = [
            'count' => $products->count(),
            'products' => $products->paginate(10),
            'keyword' => $keyword,
        ];

        return view('client.home.search', $data);
    }
    public function searchAjax(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $products = Product::where('pro_name', 'LIKE', '%' . $request->search . '%')
                ->where('pro_active', 1)
                ->with($this->relationship())->limit(5)->get();

            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= '<div onmousedown="return false;"
                    class="autocomplete-suggestion" data-index="' . $key . '">
                        <div class="search-item" onclick="#">
                            <div class="img"><img
                                    src="' . asset('images/products/' . $product->pro_avatar) . '" />
                            </div>
                            <div class="info">
                                <h2>
                                    <a href="' . route('client.product', [
                        'slug' => $product->category->c_slug,
                        'brand' => $product->brand->b_slug,
                        'product' => $product->pro_slug,
                    ]) . '">' . $product->pro_name . '</a>
                                </h2>
                                <h3><strike></strike> ' . number_format($product->pro_price) . ' ₫</h3>
                            </div>
                        </div>
                    </div>';
                }
                $output .= '<p class="more-results">
                Nhấn Enter để xem tất cả kết quả cho <strong>' . $request->search . '</strong></p>';
            }
            return Response($output);
        }
    }
}
