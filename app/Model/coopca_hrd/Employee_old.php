<?php

namespace App\Model\coopca_hrd;

use Illuminate\Database\Eloquent\Model;

class Employee_old extends Model
{
    //

    protected $connection = 'coopca_hrd';
    protected $primaryKey = 'cfcodeno';
    protected $table = 'employee1';
    public $timestamps = false;
    // public function getDepartment(){
    // 	 return $this->hasOne('App\Model\coopca_hrd\Department', 'cfacronym', 'cfgroup2');
    // }
    // public function getSchool(){
    // 	 return $this->hasMany('App\Model\coopca_hrd\EmployeeSchool', 'cfcodeno', 'cfcodeno');
    // }
    // public function getJobHistory(){
    // 	 return $this->hasMany('App\Model\coopca_hrd\EmployeeJob', 'cfcodeno', 'cfcodeno')->orderBy('dfdate1','asc');
    // }

}
