<?php

namespace App\Http\Controllers;

use App\Models\Prisioner;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        $model = $request->input('model');
        $columns = $request->input('columns');
        $fileName = $request->input('file_name', 'export.xlsx');

        $modelClass = 'App\\Models\\' . $model;
        $data = $modelClass::all($columns);

        return Excel::download(new GeneralExport($data, $columns), $fileName);
    }
}

