<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageStatus extends Model
{
    protected $table='package_status';

    public function package(){
        return $this->hasMany('App\Models\Package','status_id');
    }


}
