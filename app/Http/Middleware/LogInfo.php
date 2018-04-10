<?php

namespace App\Http\Middleware;

use Closure;

use \Illuminate\Support\Facades\Cookie;

use Auth;
use \App\Model\coopca_hrd\Employee;
class LogInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {



        



            
            if(!$request->cookie('appkey') && Auth::check()){

                $User = Employee::where('cfcodeno','=',Auth::user()->employee_no)->limit('1')->get()->first();


                return redirect(route('home'))->withCookie('emp_code',$User->cfcodeno,2628000)
                             ->withCookie('emp_department',$User->cfgroup2.' '.$User->cfgroup3,2628000)
                             ->withCookie('emp_position',$User->cfgroup1.' '.$User->cfgroup2,2628000)

                             ->withCookie('appkey','appkey',2628000);


            }


            return $next($request);

           

                   
            
        

    }
}
