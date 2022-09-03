<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Import\ImportRepository;
use Illuminate\Http\Request;
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
                'supplier',
                'admin'
            ]
        );
        return view('admin.import.index', compact('imports'));
    }

    public function store(Request $request)
    {
        $data = [
            'i_date' => $request->i_date,
            'supplier_id' => $request->supplier_id,
        ];
        $data['admin_id'] = Session()->get('admin')->id;
        try {
            DB::beginTransaction();
            $import = $this->importRepository->create($data);
            if (!$import) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Thêm mới thất bại');
            }
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function show($id)
    {
        return view('admin.import.show');
    }
}