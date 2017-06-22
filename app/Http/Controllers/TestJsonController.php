<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestJsonController extends Controller
{
    public function index(){
        $package=Package::with('status')->first();
        return response()->json($package);
    }
}
