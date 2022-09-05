<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ImportExport;
use App\Http\Controllers\Controller;
use App\Repositories\Import\ImportRepository;
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
                'products' => function ($query) {
                    $query->with('category');
                }
            ]
        );
        return view('admin.import.index', compact('imports'));
    }

    public function export()
    {
        $fileName = 'imports.xlsx';
        return Excel::download(new ImportExport, $fileName);
    }
}