@extends('site.layouts.master_left_sidebar')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                แก้ไขข้อมูลส่วนตัว
            </div>
        </div>
        <div class="panel-body">
            <form files='true' enctype="multipart/form-data" class="form-horizontal" action="{{route('member.update',$member->id)}}" method="post">
                <input value="PUT" type="hidden" name="_method" >
                {{ csrf_field() }}

                        <!-- Username-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">UserName</label>
                    <div class="col-md-8">
                        <input readonly value="{{$member->username}}" id="username" name="username" type="text" class="form-control">
                        <div class="text-danger">{{$errors->first('username')}}</div>
                    </div>
                </div>

                <!--Name-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">ชื่อ</label>
                    <div class="col-md-8">
                        <input value="{{$member->name}}" id="name" name="name" type="text" class="form-control">
                    </div>
                </div>
                <!--Surname-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="surname">นามสกุล</label>
                    <div class="col-md-8">
                        <input value="{{$member->surname}}" id="surname" name="surname" type="text" class="form-control">
                    </div>
                </div>
                {{--Image--}}
                <div class="form-group">
                    <label class="col-md-4 control-label" for="surname">นามสกุล</label>
                    <div class="col-md-8">
                        <input name="image" type="file">
                    </div>
                </div>
                <!-- Multiple Radios -->
                <?php
                $male='';
                $female='';
                if($member->gender=='male')
                    $male='checked';
                else
                    $female='checked';
                ?>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="gender">เพศ</label>
                    <div class="col-md-4">
                        <div class="radio">
                            <label for="radios-0">
                                <input {{$male}} type="radio" name="gender" id="gender-0" value="male" checked="checked">
                                ชาย
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radios-1">
                                <input {{$female}} type="radio" name="gender" id="gender-1" value="female">
                                หญิง
                            </label>
                        </div>
                    </div>
                </div>
                <!--Tel-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tel">เบอร์โทร</label>
                    <div class="col-md-8">
                        <input value="{{$member->tel}}" id="tel" name="tel" type="text" class="form-control">
                    </div>
                </div>
                <!--Address-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="address">ที่อยู่</label>
                    <div class="col-md-8">
                        <input value="{{$member->address}}" id="address" name="address" type="text" class="form-control">
                    </div>
                </div>
                <!--Province-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="province">จังหวัด</label>
                    <div class="col-md-8">
                        <input value="{{$member->province}}" id="province" name="province" type="text" class="form-control">
                    </div>
                </div>
                <!--Province-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="postcode">รหัสไปรษณีย์</label>
                    <div class="col-md-8">
                        <input value="{{$member->postcode}}" id="postcode" name="postcode" type="text" class="form-control">
                    </div>
                </div>
                <!-- Submit -->
                <div class="form-group">
                    <div class="col-xs-12 col-md-offset-8 col-md-4">
                        <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection