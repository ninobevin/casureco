<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArchiveItem extends Model
{
    //
    protected $table = "archive_item";

    public function getArchiveType(){
    	 return $this->hasOne('App\Model\ArchiveType', 'id', 'archive_archive_type_id');
    }
}
