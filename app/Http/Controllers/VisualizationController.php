<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Leave;

class VisualizationController extends Controller
{
    //
    public function index()
    {
        $resignedEmp = DB::table('employees')
                    ->join('leaves','employees.employee_number','=','leaves.employee_number')
                    ->get();
        $maleM = 0;
        $femaleM = 0;
	    $maleS = 0;
	    $femaleS = 0; 
        $maleSper = 0;
        $femaleSper = 0;
	    $maleMper=0;
	    $femaleMper=0;
        $posdev = 0;
        $posqa = 0;
        $pospartime = 0;
        $posintership = 0;
        $posother = 0;

        foreach($resignedEmp as $emp) {
            if ($emp->gender == 'Male' && ($emp->marital_status == 'Single' || $emp->marital_status == 'Độc thân'))
                $maleS++;
            else if ($emp->gender == 'Male' && $emp->marital_status == 'Merried ')        
	    	    $maleM++;
	        else if ($emp->gender == 'Female' && ($emp->marital_status =='Single' || $emp->marital_status == 'Độc thân'))
                $femaleS++;
	        else if ($emp->gender == 'Female' && $emp->marital_status=='Merried ')
                $femaleM++;
            if ($emp->last_position == 'DEV')
                $posdev++;
            else if ($emp->last_position == 'QA')
                $posqa++;
            else if ($emp->last_position == 'Partime' || $emp->last_position == 'partime')
                $pospartime++;
            else if ($emp->last_position == 'Intership' || $emp->last_position == 'intership')
                $posintership++;
            else $posother++;
        }
        $maleSper = round($maleS*100/($maleS + $femaleS + $maleM + $femaleM), 1);
        $femaleSper = round($femaleS*100/($maleS + $femaleS + $maleM + $femaleM), 1);
	    $maleMper = round($maleM*100/($maleS + $femaleS + $maleM + $femaleM), 1);
	    $femaleMper = round($femaleM*100/($maleS + $femaleS + $maleM + $femaleM), 1);
        //dd($maleSper, $femaleSper, $maleMper, $femaleMper);
        //dd($maleS, $femaleS, $maleM, $femaleM);

        return view('employee.index', ['resignedEmp' => $resignedEmp,
                                       'maleSper' => $maleSper,
                                       'femaleSper' => $femaleSper,
				                       'maleMper' => $maleMper,
				                       'femaleMper' => $femaleMper,
                                       'posdev' => $posdev,
                                       'posqa' => $posqa,
                                       'pospartime' => $pospartime,
                                       'posintership' => $posintership,
                                       'posother' => $posother]);
	}
}
