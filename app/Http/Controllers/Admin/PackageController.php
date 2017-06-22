<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Models\PackagePrice;
use App\Models\PackageStatus;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

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
        $packages=Package::orderBy('updated_at','desc')->paginate(10);

        return view('admin.package.index')->with('packages',$packages);
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
        $statuses=PackageStatus::all();
        $driver=Member::where('id',$package->staff_id)->first();
        return view('admin.package.show')->with(
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
        $driver_position=$request->input('driver_current_position');
        $driver_position=substr($driver_position,1,-1);
        $driver_position=explode(',',$driver_position);

        $package=Package::with('status')->where('id',$id)->first();
        $package->staff_lat=trim($driver_position[0]);
        $package->staff_lng=trim($driver_position[1]);
        $package->status_id=$request->input('status');
        $package->staff_id=Auth::user()->id;
        $package->save();

        return redirect()->route('admin.package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Package::destroy($id);
        return redirect()->route('admin.package.index');
    }
}
