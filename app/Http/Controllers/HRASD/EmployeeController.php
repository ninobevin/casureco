<?php

namespace App\Http\Controllers\HRASD;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\coopca_hrd\Employee;
use App\Model\coopca_hrd\Employee_old;
use \DB;

class EmployeeController extends Controller
{
    //

    public function index(Request $request){


    	$employee = [];



        if($request->search == '' && $request->group == '' && $request->status==''){

          


            $employee =  Employee::where('cfstatus','!=','123')
                        ->orderBy(DB::raw("concat(cffname,' ',cfmname,' ',cflname)"))
                        ->paginate(30);

            return view('page.Employee.employee_search',['employee' => $employee]);

        }

   



         $status = $request->status !== 'all' ? $request->status[0] : '';
         $group = $request->group !== 'all' ? $request->group : '';          


    	$q = "%".implode("%%", explode(" ", $request->search))."%";

        	
        	$employee = Employee::where(DB::raw("concat(cffname,' ',cfmname,' ',cflname)"),'like',$q)
                        ->Where('cfstatus','like',$status.'%')
                        ->Where('cfgroup2','like','%'.$group.'%')
                        ->orderBy(DB::raw("concat(cffname,' ',cfmname,' ',cflname)"))
                        ->paginate(30);

        	return view('page.Employee.employee_search',['employee' => $employee]);

    

    	//return view('page.Employee.employee_search',['employee' => $employee]);
    }



    public function profile(Request $request){


    	$Employee = Employee::where('cfcodeno','=',$request->id)->get()->first();

    	return view('page.Employee.profile',['Employee'=>$Employee]);

    }
    public function save_pic(Request $request){

        if(empty(trim($request->imgpic)))
        {
            // $picture_ext =  explode(";", explode("/", $request->picture_ext)[1])[0]; 
            return redirect()->back();
        }

         $encodedData = str_replace(' ','+',$request->imgpic);
         $decodedData = base64_decode($encodedData);

        

         $Employee = Employee::where('cfcodeno','=',$request->id)->limit(1)->get()->first();
         //$Employee->mfpicture = $request->picture_ext.','.$request->imgpic; 
        

         
          $Employee->mfpicture  = $decodedData;
         
         $Employee->save();

         //$Employee_old = Employee_old::where('cfcodeno','=',$request->id)->limit(1)->get()->first();
         //$Employee->mfpicture = $request->picture_ext.','.$request->imgpic; 
         

         
       // $Employee_old->mfpicture  = $decodedData;
         
        //$Employee_old->save();
 
        return redirect()->back();

         //$Employe
        //return view('page.Employee.profile',['Employee'=>$Employee]);

    }


    public function coe_wc_form(Request $request){

         $Employee = Employee::where('cfcodeno','=',$request->id)->get()->first();
        return view('page.Employee.coe_wc_form',['Employee'=>$Employee]);

    }

     public function coe_form(Request $request){

         $Employee = Employee::where('cfcodeno','=',$request->id)->get()->first();
        return view('page.Employee.coe_form',['Employee'=>$Employee]);

    }


    public function reports(Request $request){

        $logs = [];



          if(!empty(trim($request->date_from))){
            $logs =  \App\Logs::WhereBetween('created_at',array($request->date_from.' 00:00:00',$request->date_to.' 23:59:59'));


                    if($request->type == 'all' || $request->type == '' ){

                        

                    }else{

                        $logs = $logs->where('log_type_id','=',$request->type);
                    }

                    $logs = $logs->paginate(30);
          }else{
            
          }
                 
          
        return view('page.Employee.reports',['logs'=>$logs]);

    }


    public function addtoprintlog(Request $request){

            $logs = new \App\Logs;
            $logs->ip = $request->ip();
            $logs->description = 'WEB Print';
            $logs->log_type_id = '1';
            $logs->user_id = \Auth::user()->employee_no;
            $logs->employee_no = $request->id;
            $logs->purpose = $request->str_purpose;
            $logs->save();
            return  $logs;
    }

    public function addtoprintlogCoe(Request $request){

            $logs = new \App\Logs;
            $logs->ip = $request->ip();
            $logs->description = 'WEB Print';
            $logs->log_type_id = '2';
            $logs->user_id = \Auth::user()->employee_no;
            $logs->purpose = $request->str_purpose;
            $logs->employee_no = $request->id;
            $logs->save();
            return  $logs;
    }



    
}
