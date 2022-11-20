<?php

namespace App\Exports;

use App\Models\Imports;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImportExport implements WithHeadings, FromCollection
{
    public function headings(): array
    {
        return [
            'Mã nhập hàng',
            'Tên nhân viên',
            'Ngày nhập',
            'Tổng tiền',
            'Trạng thái',
        ];
    }

    public function collection()
    {
        $imports = Imports::select('i_code', 'i_admin_id', 'created_at', 'i_total', 'i_status')->get();
        foreach ($imports as $key => $import) {
            $import->i_code = $import->i_code;
            $import->i_admin_id = $import->admin->name;
            $import->created_at = date('d-m-Y H:i:s', strtotime($import->created_at));
            $import->i_total = number_format($import->i_total, 0, ',', '.') . ' VNĐ';
            if ($import->i_status == 1) {
                $import->i_status = 'Đang chờ';
            } else {
                $import->i_status = 'Đã xử lý';
            }
        }
        return $imports;
    }
}
