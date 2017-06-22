<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $table='users';
    protected $fillable=['username','password'];

    public function memberType(){
        return $this->belongsTo('App\Models\MemberType','user_type_id');
    }
}