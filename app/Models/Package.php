<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table='package';

    public function member(){
        return $this->belongsToMany('App\Models\Member','member_package','member_id','package_id');
    }

    public function status(){
        return $this->belongsTo('App\Models\PackageStatus','status_id');
    }
}
