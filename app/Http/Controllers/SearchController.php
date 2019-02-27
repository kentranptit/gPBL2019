<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;
use Request;

class SearchController extends Controller
{
    public function index()
    {
        $search = Request::get('s');
        $dbh = DB::table('employees');

        if(!empty($search)){
        $dbh->where('employee_number', 'like', '%'.$search.'%');
        if ($dbh->count("*")==1){
            $all_data = $dbh->get();
            return view('user',['all_data' => $all_data] );
        }
        }
        $all_data = $dbh->get();
        return view('search',['all_data' => $all_data]);
    }
}
