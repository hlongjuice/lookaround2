<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarDetail extends Model
{
    protected $table='car_details';
    protected $fillable=['driver_id','car','color','plate','model'];

    public function member(){
        return $this->belongsTo('App\Models\Member','driver_id');
    }
}
