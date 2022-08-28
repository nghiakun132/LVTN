<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    public function model(array $row)
    {
        return new Product([
            'pro_name' => $row[0],
            'pro_slug' => $row[1],
            'pro_category_id' => $row[2],
            'pro_brand_id' => $row[3],
            'pro_price' => $row[4],
            'pro_sale' => $row[5],
            'pro_quantity' => $row[6],
            'pro_description' => $row[7],
            'pro_content' => $row[8],
            'color' => $row[9],
            'group_id' => $row[10],
            'pro_avatar' => $row[11],
        ]);
    }
}