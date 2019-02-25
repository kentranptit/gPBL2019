<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Leave;
use DateTime;

class VisualizationController extends Controller
{
    //
    public function index()
    {
        $resigned_gender = DB::select("select gender, count(*) as cnt from leaves where not gender = '' group by gender");
        $arr_gender = [];
        foreach ($resigned_gender as $emp) {
            $arr_gender[$emp->gender] = $emp->cnt;
        }
        $arr_mrStatus = [];
        $resigned_mrStatus = DB::select("select marital_status, count(*) as cnt from leaves where not marital_status = '' group by marital_status");
        foreach ($resigned_mrStatus as $emp) {
            $arr_mrStatus[$emp->marital_status] = $emp->cnt;
        }
        $arr_pos = [];
        $resigned_pos = DB::select("select position, count(*) as cnt from leaves where not position = '' group by position");
        foreach ($resigned_pos as $emp) {
            $arr_pos[$emp->position] = $emp->cnt;
        }
        $arr_age = [];
        $resigned_birthday = DB::select("select birthday, probation_date from leaves where not birthday = ''");
        foreach ($resigned_birthday as $emp) {
            $dob = date('Y', strtotime($emp->birthday));
            $probation_date  = date('Y', strtotime($emp->probation_date));
            $age = $probation_date - $dob;
            $arr_age[] = $age;
        }
        // dd($arr_age);
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
        // dd($counter_25 . "<br>" . $counter_25_30 . "<br>" . $counter_30_35 . "<br>" . $counter_35);

        $resignedEmp = DB::table('leaves')->get();
        $arr_add = array();
        foreach($resignedEmp as $emp) {
            $add = $emp->address;
            if($add != "NULL") {
                array_push($arr_add, $add);
            }
        }

        return view('employee.index', [
                'resigned_gender' => $resigned_gender,
                'resigned_mrStatus' => $resigned_mrStatus,
                'resigned_pos' => $resigned_pos,
                'counter_25' =>$counter_25,
                'counter_25_30' =>$counter_25_30,
                'counter_30_35' =>$counter_30_35,
                'counter_35' =>$counter_35,
                'arr_add' => $arr_add
        ]);
	}
}
