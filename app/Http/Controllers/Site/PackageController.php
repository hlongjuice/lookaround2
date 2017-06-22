<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Models\PackagePrice;
use App\Http\Controllers\Controller;
use App\Models\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $pacake_price=PackagePrice::find(1);

        return view('site.tracking')->with('package_price',$pacake_price);
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
        $this->validate($request,[
           'sender_name'=>'required',
            'sender_phone'=>'required',
            'sender_address'=>'required',
            'receiver_name'=>'required',
            'receiver_phone'=>'required',
            'receiver_address'=>'required'
        ],[
            'required'=>'กรุณากรอกข้อมูล'
        ]);
        $package=new Package();
        $package->service_id=str_random(8);
        $package->lat_start=$request->input('lat_start');
        $package->lng_start=$request->input('lng_start');
        $package->lat_end=$request->input('lat_end');
        $package->lng_end=$request->input('lng_end');
        $package->staff_lat=$request->input('lat_start');
        $package->staff_lng=$request->input('lng_start');
        $package->detail=$request->input('detail');
        $package->status_id=1;

        $package->sender=$request->input('sender_name');
        $package->sender_phone=$request->input('sender_phone');
        $package->sender_address=$request->input('sender_address');

        $package->receiver=$request->input('receiver_name');
        $package->receiver_phone=$request->input('receiver_phone');
        $package->receiver_address=$request->input('receiver_address');
        $package->save();

        $user=Auth::user();
        $user->package()->attach($package->id);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
