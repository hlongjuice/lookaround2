@extends('site.layouts.master_left_sidebar')
@section('content')
    <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    เพิ่มผู้ใช้งาน
                </div>
            </div>
            <div class="panel-body">
                <form id="register" class="form-horizontal" action="{{route('member.store')}}" method="POST" files='true' enctype="multipart/form-data">
                    {{--<input type="hidden" name="_method " value="PUT" >--}}
                    {{ csrf_field() }}

                            <!-- Member Type-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="member_type">กลุ่มผู้ใช้งาน</label>
                        <div  class="col-md-8">
                            <select id="member_type" name="member_type" class="form-control">
                                @foreach($member_types as $member_type)
                                    <option value="{{$member_type->id}}">{{$member_type->type}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Username-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="username">UserName</label>
                        <div class="col-md-8">
                            <input id="username" name="username" type="text" class="form-control">
                            <div class="text-danger">{{$errors->first('username')}}</div>
                        </div>
                    </div>
                    <!--Password-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">รหัสผ่าน</label>
                        <div class="col-md-8">
                            <input id="password" name="password" type="password" class="form-control">
                            <div class="text-danger">{{$errors->first('password')}}</div>
                        </div>

                    </div>
                    <!--Password Confirm-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="confirm_password">ยืนยันรหัสผ่าน</label>
                        <div class="col-md-8">
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                        </div>
                    </div>
                    <!--Name-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">ชื่อ</label>
                        <div class="col-md-8">
                            <input id="name" name="name" type="text" class="form-control">
                        </div>
                    </div>
                    <!--Surname-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="surname">นามสกุล</label>
                        <div class="col-md-8">
                            <input id="surname" name="surname" type="text" class="form-control">
                        </div>
                    </div>
                    {{--Image--}}
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="surname">รูปประจำตัว</label>
                        <div class="col-md-8">
                            <input name="image" type="file">
                        </div>
                    </div>
                    <!-- Multiple Radios -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="gender">เพศ</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label for="radios-0">
                                    <input type="radio" name="gender" id="gender-0" value="male" checked="checked">
                                    ชาย
                                </label>
                            </div>
                            <div class="radio">
                                <label for="radios-1">
                                    <input type="radio" name="gender" id="gender-1" value="female">
                                    หญิง
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--Tel-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="tel">เบอร์โทร</label>
                        <div class="col-md-8">
                            <input id="tel" name="tel" type="text" class="form-control">
                        </div>
                    </div>
                    <!--Address-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="address">ที่อยู่</label>
                        <div class="col-md-8">
                            <input id="address" name="address" type="text" class="form-control">
                        </div>
                    </div>
                    <!--Province-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="province">จังหวัด</label>
                        <div class="col-md-8">
                            <input id="province" name="province" type="text" class="form-control">
                        </div>
                    </div>
                    <!--Province-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="postcode">รหัสไปรษณีย์</label>
                        <div class="col-md-8">
                            <input id="postcode" name="postcode" type="text" class="form-control">
                        </div>
                    </div>
                    <!--Car-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="car">ลายละเอียดสำหรับขนส่งของ</label>
                    </div>
                    <!--Car-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="car">ยี้ห้อ</label>
                        <div class="col-md-8">
                            <input id="car" name="car" type="text" class="form-control">
                        </div>
                    </div>
                    <!--Car Model-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="car_model">รุ่น</label>
                        <div class="col-md-8">
                            <input id="car_model" name="car_model" type="text" class="form-control">
                        </div>
                    </div>

                    <!--Car color-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="car_color">สีรถ</label>
                        <div class="col-md-8">
                            <input id="car_color" name="car_color" type="text" class="form-control">
                        </div>
                    </div>

                    <!--Car Plate-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="car_plate">ป้ายทะเบียน</label>
                        <div class="col-md-8">
                            <input id="car_plate" name="car_plate" type="text" class="form-control">
                        </div>
                    </div>
                    <!-- Submit -->
                    <div class="form-group">
                        {{--<label class="col-md-4 control-label" for="submit">สมัครสมาชิก</label>--}}
                        <div class="col-xs-12 col-md-offset-8 col-md-4">
                            <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">สมัครสมาชิก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection