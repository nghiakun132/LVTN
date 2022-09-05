<?php

namespace App\Exports;

use App\Models\Import;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImportExport implements WithHeadings, FromCollection
{
    public function headings(): array
    {
        return [
            'ID',
            'Tên sản phẩm',
            'Danh mục',
            'Giá nhập',
            'Số lượng',
            'Trạng thái',
        ];
    }

    public function collection()
    {
        $imports = Import::with([
            'products' => function ($query) {
                $query->with([
                    'category' => function ($query) {
                        $query->select('c_id', 'c_name');
                    },
                ]);
            },
        ])->get();
        $data = [];
        foreach ($imports as $import) {
            $data[] = [
                'Tên sản phẩm' => $import->products->pro_name,
                'Danh mục' => $import->products->category->c_name,
                'Giá nhập' => $import->i_price,
                'Số lượng' => $import->i_quantity,
                'Trạng thái' => $import->i_status == 1 ? 'Đã nhập' : 'Chưa nhập',
            ];
        }
        return collect($data);
    }
}