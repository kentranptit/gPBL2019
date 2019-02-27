<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;
use Request;

class SearchController extends Controller
{
  public function index(){
    $search = Request::get('s');
    $search_g = Request::get('gender');
    if($search_g==1){$search_g = "Male";}
    if($search_g==2){$search_g = "Female";}
    $dbh = DB::table('employees');
    $dbn = DB::table('employees');
    $dbc = DB::table('checkin_outs');
    if(!empty($search_g)){
          $dbh->where('gender', '=',$search_g);
          $dbn->where('gender', '=',$search_g);
          $dbc->where('gender', '=',$search_g);
        }
    if(!empty($search)){
      $dbh->where('employee_number', 'like', '%'.$search.'%');
      if($dbh->count("*")==0){
        $dbn->where('name', 'like', '%'.$search.'%');
        if($dbn->count("*")==1){
          $all_data = $dbn->get();
          $dbc->where('name', 'like', '%'.$search.'%');
          $c_data = $dbc->get();//,['c_data' => $c_data]
          return view('user',['all_data' => $all_data],['c_data' => $c_data]);
        }
        $all_data = $dbn->get();
        return view('search',['all_data' => $all_data]);
      }
      if($dbh->count("*")==1){
      //  $c_data = $dbc->get();
        $dbc->where('employee_number', 'like', '%'.$search.'%');
        $c_data = $dbc->get();
        $all_data = $dbh->get();
        //$c_data = $dbc->get();
        return view('user',['all_data' => $all_data],['c_data' => $c_data]);
      }
    }
    $all_data = $dbh->get();
    return view('search',['all_data' => $all_data]);
  }
}
