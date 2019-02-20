<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Leave;

class JoinController extends Controller
{
    //
    public function index()
    {
        $employees = DB::table('employees')
                    ->join('leaves','employees.employee_number','=','leaves.employee_number')
                    ->get();
        return view('leave.index', ['employees' => $employees]);
    }
}
