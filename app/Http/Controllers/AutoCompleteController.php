<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \DB;

class AutoCompleteController extends Controller
{
    //

    public function employeeAutoComplete(Request $request){



        if(trim($request->term) ==""){

            return   $arr[] = "";
        }

        $q = "%".implode("%%", explode(" ", $request->term))."%";

        
                 $result = DB::connection('coopca_hrd')->select( DB::raw("
                           
                        
                        select concat(cffname,' ',cfmname,' ',cflname) as resultvar from employee1 where 

                            concat(cffname,' ',cfmname,' ',cflname) 

                        like :varsval


                    "), array(
                    'varsval' => $q,
                  ));

                 if(count($result) <= 0)
                     $arr[] = "";

                   

                 foreach ($result as $key) {
                     $arr[] =  $key->resultvar;
                 }
                 return $arr;

    } 
    public function employeeAutoComplete2(Request $request){


            if(trim($request->term) ==""){

                return   $arr[] = "";
            }

            $q = "%".implode("%%", explode(" ", $request->term))."%";

      
                     $result = DB::select( DB::raw("

                     	select description as resultvar from archive_item where description 
                          like :varsval 

                            limit 10

                        "), array(
                        'varsval' => $q,
                      ));
            if(count($result) <= 0)
                $arr[] = "";

              

            foreach ($result as $key) {
                $arr[] =  $key->resultvar;
            }
            return $arr;
    }
}
