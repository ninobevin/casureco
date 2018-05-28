<?php

namespace App\Model\coopca_hrd;

use Illuminate\Database\Eloquent\Model;

class EmployeeJob extends Model
{
    //
    protected $connection = 'coopca_hrd';
    protected $primaryKey = 'idjob2';
    protected $table = 'job2';

}