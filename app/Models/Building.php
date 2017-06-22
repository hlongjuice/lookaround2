<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table='building';
    protected $fillable=
        ['title','lat','lng','description','created_by','updated_by'];
}
