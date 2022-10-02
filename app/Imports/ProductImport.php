<?php

namespace App\Imports;

use App\Models\import_details;
use App\Models\imports;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection
{
    public function collection($rows)
    {
        $codeImport = Str::random(10);
        $adminId = session()->get('admin')->id;
        $total = 0;
        $status = 1;
        $import = new imports();
        $import->i_code = $codeImport;
        $import->i_admin_id = $adminId;
        $import->i_status = $status;
        $import->i_total = $total;
        $import->save();
        foreach ($rows as $row) {
            $product = new Product();
            $product->pro_name = $row[0];
            $product->pro_slug = Str::slug($row[0]);
            $product->sku = $row[1];
            $product->pro_category_id = $row[2];
            $product->pro_brand_id = $row[3];
            $product->pro_price = $row[4];
            $product->pro_sale = $row[5];
            $product->pro_quantity = $row[6];
            $product->pro_avatar = $row[7];
            $product->save();

            $total += $row[4] * $row[6];
            $importDetail = new import_details();
            $importDetail->import_id = $import->i_id;
            $importDetail->product_id = $product->pro_id;
            $importDetail->quantity = $row[6];
            $importDetail->price = $row[4];
            $importDetail->save();
        }
        $ip = imports::where('i_id', $import->i_id)->first();
        $ip->i_total = $total;
        $ip->save();
    }
}