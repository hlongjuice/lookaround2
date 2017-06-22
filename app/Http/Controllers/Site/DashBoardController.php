<?php

namespace App\Http\Controllers\Site;

use App\Models\Package;
use Illuminate\Http\Request;
use Auth;
use App\Models\PackagePrice;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
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

        $user_type=Auth::user()->member_type_id;
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
