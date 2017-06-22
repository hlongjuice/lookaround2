@extends('site.layouts.master_left_sidebar)
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                ข้อมูลส่วนตัว
            </div>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{route('member.store')}}" method="POST">
                {{ csrf_field() }}

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
                <!-- Gender -->
                <?php
                    $male='';
                    $female='';
                    if($member->gender=='ชาย')
                        $male='checked="checked"';
                    else if($member->gender=='หญิง')
                        $female='checked="checked"';
                ?>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="gender">เพศ</label>
                    <div class="col-md-4">
                        <div class="radio">
                            <label for="radios-0">
                                <input type="radio" name="gender" id="gender-0" value="male" {{$male}}>
                                ชาย
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radios-1">
                                <input type="radio" name="gender" id="gender-1" value="female" {{$female}}>
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
                    <label class="col-md-4 control-label" for="surname">ที่อยู่</label>
                    <div class="col-md-8">
                        <input {{$member->address}} id="address" name="address" type="text" class="form-control">
                    </div>
                </div>
                <!-- Submit -->
                <div class="form-group">
                    {{--<label class="col-md-4 control-label" for="submit">สมัครสมาชิก</label>--}}
                    <div class="col-md-4">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">สมัครสมาชิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection