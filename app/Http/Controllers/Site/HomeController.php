<?php

namespace App\Http\Controllers\Site;

use App\Models\ProductCategoryMenu;
use Illuminate\Http\Request;
use Auth;
use App\Models\Package;
use App\Models\PackagePrice;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');

    }
    public function index(){

//        if(Auth::user())
//            return view()
        if(Auth::user()){
            $user_type=Auth::user()->memberType->id;
//        echo Auth::user()->memberType->id;
            if($user_type==3 || $user_type==2)
            {
                $package_price=PackagePrice::find(1);
                $package_count=Package::where('status_id',1)->count();
                return view('site.dashboard')
                    ->with([
                        'package_price'=>$package_price,
                        'package_count'=>$package_count
                    ]);
            }

            else
                return view('site.dashboard');
        }
        return view('site.index2');
    }
}
