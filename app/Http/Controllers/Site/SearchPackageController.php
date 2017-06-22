<?php

namespace App\Http\Controllers\Site;

use App\Models\Member;
use App\Models\Package;
use App\Models\PackagePrice;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchPackageController extends Controller
{
    public function index(){
        return view('site.users.package.search.index');
    }
    public function search(Request $request){
        $this->validate($request,[
           'service_id'=>'required'
        ],[
            'service_id.required'=>'กรุณากรอกหรัสบริการ'
        ]);
        $service_id=$request->input('service_id');
        $package=Package::with('status')->where('service_id',$service_id)->first();
        $package_price=PackagePrice::find(1);
        $driver=Member::where('id',$package->staff_id)->first();
        if(!$package)
            return redirect()->back()->withErrors(['service'=>'ไม่พบรายการที่ระบุ']);
        return view('site.users.package.history.show')
            ->with([
                'package'=>$package,
                'package_price'=>$package_price,
                'driver'=>$driver   
            ]);
    }
}
