<?php

namespace App\Http\Controllers\Driver;

use Illuminate\Http\Request;
use App\Models\Package;
use Auth;
use App\Models\PackagePrice;
use App\Models\PackageStatus;
use App\Models\Member;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceHistoryController extends Controller
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
        $packages=Package::with('status')->where('staff_id',Auth::user()->id)->orderBy('updated_at','desc')->paginate(15);
        return view('driver.package.service_history.index')->with('packages',$packages);
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
        return view('driver.package.service_history.show')->with(
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
        //
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
