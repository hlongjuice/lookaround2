<?php

namespace App\Http\Controllers\Driver;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Member;
use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\PackagePrice;
use App\Models\PackageStatus;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $packages=Package::where('status_id',1)->orderBy('updated_at','desc')->paginate(10);
        return view('driver.package.index')->with('packages',$packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package=Package::where('id',$id)->first();
        $package_price=PackagePrice::find(1);
        $statuses=PackageStatus::whereBetween('id',[1,2])->get();
        $driver=Member::where('id',$package->staff_id)->first();
        return view('driver.package.show')->with(
            [
                'package'=>$package,
                'driver'=>$driver,
                'package_price'=>$package_price,
                'statuses'=>$statuses
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'driver_position_lat'=>'required'
        ],[
            'driver_position_lat.required'=>'กรุณาระบุตำแหน่งรถส่งของ'
        ]);
        $package=Package::with('status')->where('id',$id)->first();
        $driver_position=explode(',',$request->input('txtSource'));

        /*Remove Driver Id if Status is 1*/
        if($request->input('status')==1){
            $package->staff_id=null;
            $package->status_id=$request->input('status');
            $package->staff_lat=$package->lat_start;
            $package->staff_lng=$package->lng_start;
            $package->save();
        }
        elseif($request->input('status')==2){
            $package->staff_lat=trim($request->input('driver_position_lat'));
            $package->staff_lng=trim($request->input('driver_position_lng'));
            $package->status_id=$request->input('status');
            $package->staff_id=Auth::user()->id;
            $package->save();
        }
        elseif($request->input('status')==3){
            $package->staff_lat=trim($driver_position[0]);
            $package->staff_lng=trim($driver_position[1]);
            $package->status_id=$request->input('status');
            $package->staff_id=Auth::user()->id;
            $package->save();
        }
        elseif($request->input('status')==5){
            $package->staff_id=Auth::user()->id;
            $package->status_id=$request->input('status');
            $package->staff_lat=$package->lat_start;
            $package->staff_lng=$package->lng_start;
            $package->save();
        }
        else{
            $package->staff_lat=$package->lat_end;
            $package->staff_lng=$package->lng_end;
//            $package->staff_lat=floatval($package->lat_end)+0.00002;
//            $package->staff_lng=floatval($package->lng_end)+0.00003;
            $package->status_id=$request->input('status');
            $package->staff_id=Auth::user()->id;
            $package->save();
        }
        return redirect()->route('home');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
