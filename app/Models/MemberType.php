<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    protected $table='user_type';

    public function member(){
        return $this->hasMany('App\Models\Member','user_type_id');
    }
}
