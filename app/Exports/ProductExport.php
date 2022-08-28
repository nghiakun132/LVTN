<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements WithHeadings, FromCollection
{
    public function headings(): array
    {
        return [
            'pro_name',
            'pro_slug',
            'category',
            'brand_id',
            'pro_price',
            'pro_sale',
            'pro_quantity',
            'pro_description',
            'pro_content',
            'color',
            'group_id',
            'pro_avatar',
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
        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'pro_name' => $product->pro_name,
                'pro_slug' => $product->pro_slug,
                'category' => $product->category->c_name,
                'brand' => $product->brand->b_name,
                'pro_price' => $product->pro_price,
                'pro_sale' => $product->pro_sale,
                'pro_quantity' => $product->pro_quantity,
                'pro_description' => $product->pro_description,
                'pro_content' => $product->pro_content,
                'color' => $product->color,
                'group_id' => $product->group->name,
                'pro_avatar' => $product->pro_avatar,
            ];
        }
        return collect($data);
    }
}