<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImportExport implements WithHeadings, FromCollection
{
    public function headings(): array
    {
        return [
            'ID',
            'Tên nhân viên',
            'Ngày nhập',
            'Tổng tiền',
            'Trạng thái',
        ];
    }

    public function collection()
    {
    }
}