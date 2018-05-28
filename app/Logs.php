<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    //

    protected $connection = 'mysql';

    protected $table = 'office_log';
    //public $timestamps = false;




    public function getType(){
    	 return $this->hasOne('App\LogType', 'id', 'log_type_id');
    }


    public function getEmployee(){
    	 return $this->hasOne('App\Model\coopca_hrd\Employee', 'cfcodeno', 'employee_no');
    }

    public function getUser(){
    	 return $this->hasOne('App\Model\coopca_hrd\Employee', 'cfcodeno', 'user_id');
    }

    // public function getEmployee(){
    // 	 return $this->hasOne('App\LogType', 'id', 'log_type_id');
    // }


}
