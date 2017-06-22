<?php

namespace App\Http\Controllers\Admin;
use App\Models\CarDetail;
use App\Models\Member;
use App\Models\MemberType;
use Illuminate\Http\Request;
use App\Http\Requests;
use File;
use Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members=Member::with('memberType')->orderBy('updated_at','desc')->paginate(15);
        return view('admin.users.index')->with('members',$members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member_types=MemberType::all();
//        if(Auth::user()->member_type_id==3)
        return view('admin.users.register')->with('member_types',$member_types);
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
        $member=Member::with('memberType')->where('id',$id)->first();
        $member_type=MemberType::all();
        return view('admin.users.edit')->with([
            'member'=>$member,
            'member_types'=>$member_type
        ]);
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
        $member=Member::where('id',$id)->first();

        $member->member_type_id=$request->input('member_type');
        $member->name=$request->input('name');
        $member->surname=$request->input('surname');
        $member->gender=$request->input('gender');
        $member->tel=$request->input('tel');
        $member->address=$request->input('address');
        $member->province=$request->input('province');
        $member->postcode=$request->input('postcode');
        if($request->hasFile('image')){
            if(File::exists($member->image)){
                File::delete($member->image);
            }
            $path='images/members/'.$request->input('username');
            $image='images/members/'.$request->input('username').'/'.$request->file('image')->getClientOriginalName();
            $member->image=$image;
            if(!File::exists($path)){
                File::makeDirectory($path);
            }
            Image::make($request->file('image'))->resize(200,200)->save($image);
        }
        $member->save();
        if($member->member_type_id==2){

            $car= CarDetail::where('driver_id',$member->id)->first();
            if($car){
                $car->driver_id=$member->id;
                $car->car=$request->input('car');
                $car->color=$request->input('car_color');
                $car->plate=$request->input('car_plate');
                $car->model=$request->input('car_model');
                $car->save();
            }
            else{
                $car=new CarDetail();
                $car->driver_id=$member->id;
                $car->car=$request->input('car');
                $car->color=$request->input('car_color');
                $car->plate=$request->input('car_plate');
                $car->model=$request->input('car_model');
                $car->save();
            }
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
        $member=Member::destroy($id);
        return redirect()->route('admin.members.index');
    }
}
