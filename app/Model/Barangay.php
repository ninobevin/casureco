<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    //
    protected $table='bgy';
    protected $primaryKey = 'idbgy';

    
	public function getOffice(){
	  	 return $this->hasOne('App\Model\Office', 'cfoffice', 'cftowncode');
	}
	public function getArea(){
	  	 return $this->hasOne('App\Model\Area', 'cfareacode', 'cftowncode');
	}
}
