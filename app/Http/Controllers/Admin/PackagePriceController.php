<?php

namespace App\Http\Controllers\Admin;

use App\Models\PackagePrice;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PackagePriceController extends Controller
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
        echo "Hello World";
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
        $package_price=PackagePrice::find(1);

        return view('admin.package.price.index')->with('package_price',$package_price);
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
           'start_price'=>'numeric',
            'weight_price'=>'numeric',
            'distance_price'=>'numeric'
        ],[
            'numeric'=>'กรุณาระบุเป็นตัวเลขเท่านั้น'
        ]);
        $package_price=PackagePrice::find(1);

        if($request->input('start_price')!='')
        $package_price->start_price=$request->input('start_price');
        if($request->input('weight_price')!='')
        $package_price->weight_price=$request->input('weight_price');
        if($request->input('distance_price')!='')
        $package_price->distance_price=$request->input('distance_price');
        $package_price->save();

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
