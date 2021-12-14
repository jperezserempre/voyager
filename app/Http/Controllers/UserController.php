<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new UsersImport, $file);

        return 'too bien';
    }

    public function export() 
    {
        (new UsersExport)->store('users.xlsx');

        return 'too bien';
    }
}
