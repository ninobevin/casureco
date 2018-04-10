<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Model\coopca_hrd\Employee;
use App\User;


class UserController extends Controller
{
    //

	public function find(Request $request){



		$Employee = Employee::where('cfcodeno','=',$request->empcode)->get()->first();

		//dd($Employee->cffname);

		return view('auth.register',['Employee'=> $Employee]);


	}

	public function create(Request $request){




		if($request->password != $request->confirm_password){


		 \Session::flash('error_msg',"Password don\'t match.");
		
		}

		

		$user = new User();

		$user->username = $request->username;
		$user->name = $request->fullname;
		$user->email = $request->email;
		$user->name = $request->fullname;
		$user->employee_no = $request->employee_no;
		$user->password = \Hash::make($request->password);


			if($user->save()){

			  \Session::flash('success_msg','New user added.');
			  return redirect(route('login'));


			}else{

			 \Session::flash('error_msg','Sorry somthing\'s wrong...');
			 return redirect()->back();
		 
			}






	}
	

}
