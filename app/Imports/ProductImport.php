<?php

namespace App\Imports;

use App\Models\Import;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection
{
    // public function model(array $row)
    // {
    //     // return new Product([
    //     //     'pro_name' => $row[0],
    //     //     'pro_slug' => $row[1],
    //     //     'pro_category_id' => $row[2],
    //     //     'pro_brand_id' => $row[3],
    //     //     'pro_price' => $row[4],
    //     //     'pro_sale' => $row[5],
    //     //     'pro_quantity' => $row[6],
    //     //     'pro_description' => $row[7],
    //     //     'pro_content' => $row[8],
    //     //     'color' => $row[9],
    //     //     'group_id' => $row[10],
    //     //     'pro_avatar' => $row[11],
    //     // ]);
    //     $product = new Product();
    //     $product->pro_name = $row[0];
    //     $product->pro_slug = Str::slug($row[0]);
    //     $product->pro_category_id = $row[2];
    //     $product->pro_brand_id = $row[3];
    //     $product->pro_price = $row[4];
    //     $product->pro_sale = $row[5];
    //     $product->pro_quantity = $row[6];
    //     $product->pro_description = $row[7];
    //     $product->pro_content = $row[8];
    //     $product->color = $row[9];
    //     $product->group_id = $row[10];
    //     $product->pro_avatar = $row[11];
    //     $product->save();
    // }


    public function collection($rows)
    {
        foreach ($rows as $row) {
            $product = new Product();
            $product->pro_name = $row[0];
            $product->pro_slug = Str::slug($row[0]);
            $product->pro_category_id = $row[1];
            $product->pro_brand_id = $row[2];
            $product->pro_price = $row[3];
            $product->pro_sale = $row[4];
            $product->pro_quantity = $row[5];
            $product->pro_description = $row[6];
            $product->pro_content = $row[7];
            $product->color = $row[8];
            $product->group_id = $row[9];
            $product->pro_avatar = $row[10];
            $product->save();

            $import = new Import();
            $import->i_product_id = $product->pro_id;
            $import->i_price = $row[3];
            $import->i_quantity = $row[5];
            $import->i_status = 1;
            $import->save();
        }
    }
}