<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Leave;
use DateTime;

class VisualizationController extends Controller
{
    public function index()
    {
        //GENDER
        $resigned_gender = DB::select("select gender, count(*) as cnt from leaves where not gender = '' and not gender = 'NULL' group by gender");
        $arr_gender = [];
        foreach ($resigned_gender as $emp) {
            $arr_gender[$emp->gender] = $emp->cnt;
        }
        $all_gender = DB::select("select gender, count(*) as cnt from employees where not gender = '' and not gender = 'NULL' group by gender");
        $arr_all_gender = [];
        foreach ($all_gender as $emp) {
            $arr_all_gender[$emp->gender] = $emp->cnt;
        }

        //MARITAL STATUS
        $arr_mrStatus = [];
        $resigned_mrStatus = DB::select("select marital_status, count(*) as cnt from leaves where not marital_status = '' and not marital_status = 'NULL' group by marital_status");
        foreach ($resigned_mrStatus as $emp) {
            $arr_mrStatus[$emp->marital_status] = $emp->cnt;
        }
        $all_mrStatus = DB::select("select marital_status, count(*) as cnt from employees where not marital_status = '' and not marital_status = 'NULL' group by marital_status");
        $arr_all_mrStatus = [];
        foreach ($all_mrStatus as $emp) {
            $arr_all_mrStatus[$emp->marital_status] = $emp->cnt;
        }

        //POSITION
        $arr_pos = [];
        $resigned_pos = DB::select("select position, count(*) as cnt from leaves where not position = '' and not position = 'NULL' group by position order by count(*) desc");
        foreach ($resigned_pos as $emp) {
            $arr_pos[$emp->position] = $emp->cnt;
        }

        //AGE
        $arr_age = [];
        $resigned_birthday = DB::select("select birthday from leaves where not birthday = '' and not birthday = 'NULL'");
        foreach ($resigned_birthday as $emp) {
            $dob = date('Y', strtotime($emp->birthday));
            $today  = date('Y', strtotime('today'));
            $age = $today - $dob;
            $arr_age[] = $age;
        }
        $all_birthday = DB::select("select birthday from employees where not birthday = '' and not birthday = 'NULL'");
        $all_age = [];
        foreach ($all_birthday as $emp) {
            $dob = date('Y', strtotime($emp->birthday));
            $today  = date('Y', strtotime('today'));
            $age = $today - $dob;
            $all_age[] = $age;
        }
        $counter_25 = 0;
        $counter_25_30 = 0;
        $counter_30_35 = 0;
        $counter_35 = 0;
        foreach ($arr_age as $age) {
            if ($age <= 25) {
                $counter_25++;
            } else if ($age > 25 && $age <= 30) {
                $counter_25_30++;
            } else if ($age > 30 && $age <= 35) {
                $counter_30_35++;
            } else {
                $counter_35++;
            }
        }
        $counter_all_25 = 0;
        $counter_all_25_30 = 0;
        $counter_all_30_35 = 0;
        $counter_all_35 = 0;
        foreach ($all_age as $age) {
            if ($age <= 25) {
                $counter_all_25++;
            } else if ($age > 25 && $age <= 30) {
                $counter_all_25_30++;
            } else if ($age > 30 && $age <= 35) {
                $counter_all_30_35++;
            } else {
                $counter_all_35++;
            }
        }

        //MAP
        $resignedEmp = DB::table('leaves')->get();
        $arr_add = array();
        foreach($resignedEmp as $emp) {
            $add = $emp->address;
            if($add != "NULL" || $add !="") {
                array_push($arr_add, $add);
            }
        }
        $allEmp = DB::table('employees')->get();
        $arr_all_add = array();
        foreach($allEmp as $emp) {
            $add = $emp->address;
            if(($add != "NULL" || $add !="") && count($arr_all_add)<100) {
                array_push($arr_all_add, $add);
            }
        }

        return view('visualize', [
                'resigned_gender' => $resigned_gender,
                'resigned_mrStatus' => $resigned_mrStatus,
                'resigned_pos' => $resigned_pos,
                'all_gender' => $all_gender,
                'all_mrStatus' => $all_mrStatus,
                'counter_25' =>$counter_25,
                'counter_25_30' =>$counter_25_30,
                'counter_30_35' =>$counter_30_35,
                'counter_35' =>$counter_35,
                'counter_all_25' =>$counter_all_25,
                'counter_all_25_30' =>$counter_all_25_30,
                'counter_all_30_35' =>$counter_all_30_35,
                'counter_all_35' =>$counter_all_35,
                'arr_add' => $arr_add,
                'arr_all_add' => $arr_all_add
        ]);
	}
}
