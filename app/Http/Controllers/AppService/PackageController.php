<?php

namespace App\Http\Controllers\AppService;

use App\Models\Package;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function index(){
        $packages=Package::with('status')->get();
        return response()->json($packages);
    }
    public function show($id){
        $package=Package::where('id',$id)->first();
        return response()->json($package);
    }
}
