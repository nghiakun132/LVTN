<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ImportExport;
use App\Http\Controllers\Controller;
use App\Repositories\ImportRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{

    protected $importRepository;

    public function __construct(ImportRepository $importRepository)
    {
        $this->importRepository = $importRepository;
    }

    public function index()
    {
        $imports = $this->importRepository->getWithRelationship(
            [
                'admin' => function ($query) {
                    $query->select('id', 'name');
                },
            ]
        );
        return view('admin.import.index', compact('imports'));
    }

    public function export()
    {
        $fileName = 'imports.xlsx';
        return Excel::download(new ImportExport, $fileName);
    }

    public function detail($id)
    {
        $import = $this->importRepository->getWithRelationshipHaveId(
            [
                'import_details' => function ($query) {
                    $query->select('import_id', 'product_id', 'quantity', 'price');
                },
                'import_details.product' => function ($query) {
                    $query->select('pro_id', 'pro_name');
                },
            ],
            $id
        );
        return view('admin.import.detail', compact('import'));
    }
    public function changeStatus($id)
    {
        $import =  $this->importRepository->update([
            'i_status' => 0,
        ], $id);
        if ($import) {
            return redirect()->route('admin.import.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('admin.import.index')->with('error', 'Cập nhật thất bại');
        }
    }
}
