<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Model\Area;

use App\Model\Barangay;
use App\Model\Office;
use App\Model\coopca_hrd\Employee;


class SearchController extends Controller
{
    //

    public function barangay(Request $request){


            if(trim($request->term) ==""){

                return   $arr[] = "";
            }

            $q = "%".implode("%%", explode(" ", $request->term))."%";

      
                     $result = DB::select( DB::raw("

                        select concat(a.cfdescript,', ',b.cfareaname,' (',c.cfofcname,')') as resultvar from bgy a join areaname b on a.cftowncode=b.cfareacode 
                            join office c on a.cftowncode=c.cfoffice where concat(a.cfdescript,', ',b.cfareaname,' (',c.cfofcname,')') like :varsval 

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
    public function area(Request $request){

     
        
    }

   
}
