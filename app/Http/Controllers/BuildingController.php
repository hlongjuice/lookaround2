<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use File;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings=Building::orderBy('updated_at','desc')->paginate(10);
        return view('site.building.index')->with('buildings',$buildings);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.building.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $building=new Building();
        $building->code=str_random(4);
        $building->title=$request->input('title');
        $building->description=$request->input('description');
        $building->lat=$request->input('newBuildingLat');
        $building->lng=$request->input('newBuildingLng');

        if($request->hasFile('image')){
            $path='images/buildings/'.$request->input('title');
            $image='images/buildings/'.$request->input('title').'/'.$request->file('image')->getClientOriginalName();
            $building->image=$image;
            File::makeDirectory($path);
            Image::make($request->file('image'))->resize(120,80)->save($image);
        }
        $building->save();

        return redirect()->route('building.index');
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
        Building::destroy($id);
        return redirect()->route('building.index');
    }
}
