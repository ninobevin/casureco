<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogType extends Model
{
    //

    protected $connection = 'mysql';

    protected $table = 'office_log_type';
    public $timestamps = false;


}
