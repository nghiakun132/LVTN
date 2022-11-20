<?php

namespace App\Exports;

use App\Models\Import_details;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements WithHeadings, FromCollection
{
    public function headings(): array
    {
        return [
            'Tên sản phẩm',
            'Danh mục',
            'Thương hiệu',
            'Giá nhập',
            'Giá bán',
            'Giảm giá',
            'Số lượng nhập',
            'Số lượng tồn',
            'Số lượng bán',
            'Nhóm sản phẩm',
        ];
    }

    public function collection()
    {
        $products = Product::with([
            'category' => function ($query) {
                $query->select('c_id', 'c_name');
            },
            'brand' => function ($query) {
                $query->select('b_id', 'b_name');
            },
            'group' => function ($query) {
                $query->select('group_id', 'name', 'slug');
            },
        ])->get();

        $import = Import_details::select('product_id', \DB::raw('SUM(quantity) as total'))
            ->groupBy('product_id')
            ->get()->toArray();

        $import = array_column($import, 'total', 'product_id');

        $products = $products->map(function ($product) use ($import) {
            $product->import = (int)$import[$product->pro_id] ?? 0;
            return $product;
        });

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'pro_name' => $product->pro_name,
                'category' => $product->category->c_name,
                'brand' => $product->brand->b_name,
                'cost' => number_format($product->pro_price, 0, ',', '.'),
                'pro_price' => number_format($product->pro_price - $product->pro_price * $product->pro_sale / 100, 0, ',', '.'),
                'pro_sale' => $product->pro_sale == 0 ? '0%' : $product->pro_sale . '%',
                'import' => $product->import,
                'pro_quantity' => $product->pro_quantity,
                'sold' => $product->import - $product->pro_quantity > 0 ? $product->import - $product->pro_quantity : 0,
                'group' => $product->group->name ?? '',
            ];
        }
        return collect($data);
    }
}
