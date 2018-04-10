<?php

namespace App\Http\Controllers\HRASD;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\coopca_hrd\Employee;
use \DB;

class EmployeeController extends Controller
{
    //

    public function index(Request $request){


    	$employee = [];

    	if(isset($request->search)){


    	$q = "%".implode("%%", explode(" ", $request->search))."%";

    	
    	$employee = Employee::where(DB::raw("concat(cffname,' ',cfmname,' ',cflname)"),'like',$q)->paginate(10);





    	
    	return view('page.Employee.employee_search',['employee' => $employee]);

    	}


    	return view('page.Employee.employee_search',['employee' => $employee]);


    }



    public function profile(Request $request){


    	$Employee = Employee::where('cfcodeno','=',$request->id)->get()->first();

    	return view('page.Employee.profile',['Employee'=>$Employee]);

    }

    public function coe_form(Request $request){



        $Employee = Employee::where('cfcodeno','=',$request->id)->get()->first();

        return view('page.Employee.coe_form',['Employee'=>$Employee]);

    }

    
}
