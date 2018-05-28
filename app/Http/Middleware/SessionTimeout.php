<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class SessionTimeout
{


     /**
     * Check the incoming request for session data, log out if session lifetime is exceeded.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     public function handle($request, Closure $next)
     {

        //$isLoggedIn = $request->path() != '/logout';

        $bag = Session::getMetadataBag();

        $max = $this->getTimeOut();

        if (($bag && $max < (time() - $bag->getLastUsed()))) {

            //$cookie = cookie('intend', $isLoggedIn ? url()->current() : 'auth/login');

            $email = Auth::user()->email;

            $returnPath = url()->current();

            $request->session()->flush(); // remove all the session data

            Auth::logout(); // logout user

            return redirect('auth/login')
                    ->withInput(compact('email', 'returnPath'))
                    //->withCookie($cookie)
                    ->withErrors(['Please login']);
            //you could also redirect to lock-screen, a completely different view 
            //and then pass the returnPath to controller method maybe via hidden filed
            //to redirect to the last page/path the user was on 
            //after successful re-login from the lock-screen.
        }

        return $next($request);


     }

     /**
     * Set a variable in .env file TIMEOUT (in seconds) to play around in the development machine.
     */
     protected function getTimeOut()
     {
        return (env('TIMEOUT')) ?: (config('session.lifetime') * 60);
     }
}  