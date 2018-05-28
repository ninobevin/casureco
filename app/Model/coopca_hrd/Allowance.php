<?php

namespace App\Model\coopca_hrd;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    //

    protected $connection = 'coopca_hrd';
    protected $primaryKey = 'id';
    protected $table = 'allowances';
    public $timestamps = false;
}
