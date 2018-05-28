<?php

namespace App\Model\coopca_hrd;

use Illuminate\Database\Eloquent\Model;

class EmployeePicture extends Model
{
    //
    protected $connection = 'coopca_hrd';
    protected $primaryKey = 'cfcodeno';
    protected $table = 'employee1';
}
