@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">เพิ่มผู้ดูแลระบบ</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.users.update',$user->id) }}">
                {{ csrf_field() }} {{--Use Token--}}
                {!! method_field('patch') !!} {{--Set method PATCH--}}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">UserName</label>

                    <div class="col-md-6">
                        <input readonly type="text" class="form-control" name="username" value={{$user->username}}>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" value="{{$user->name}}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">LastName</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="lastname" value="{{ $user->lastname}}">

                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{$user->email}}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                    {{--<label class="col-md-4 control-label">Password</label>--}}
{{----}}
                    {{--<div class="col-md-6">--}}
                        {{--<input type="password" class="form-control" name="password">--}}
{{----}}
                        {{--@if ($errors->has('password'))--}}
                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
{{----}}
                {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                    {{--<label class="col-md-4 control-label">Confirm Password</label>--}}
{{----}}
                    {{--<div class="col-md-6">--}}
                        {{--<input type="password" class="form-control" name="password_confirmation">--}}
{{----}}
                        {{--@if ($errors->has('password_confirmation'))--}}
                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--User Group--}}
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <?php
                        $show_group='style="display:none"';
                        $gruop_7=" ";
                        $gruop_8=" ";
                        $gruop_9=" ";
                        $gruop_10=" ";
                        $gruop_11=" ";

                        foreach(Auth::user()->usergroups as $usergroup)
                            $group[]=$usergroup->id;
                        if(in_array('7',$group))
                            $show_group="";
                        foreach($user->usergroups as $usergroup)
                        {
                                if($usergroup->id==7)
                                {
//                                    $show_group="";
                                    $gruop_7="checked";
                                }
                                else if($usergroup->id==8)
                                {
                                    $gruop_8="checked";
//                                    echo 'group_81'.$gruop_8;
                                }

                                else if($usergroup->id==9)
                                {
                                    $gruop_9="checked";
                                }
                                else if($usergroup->id==10)
                                    $gruop_10="checked";
                                else if($usergroup->id==11)
                                    $gruop_11="checked";
                        }
                    ?>
                    <div <?php echo $show_group?>>
                        <label class="col-md-4 control-label">หมวดหมู่</label>
                        <div class="col-md-6">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                         <input <?php echo $gruop_7;?> value="7" name="usergroup[]" type="checkbox">
                                     </span>
                                    <label class="form-control">ผู้ดูแลระบบทั้งหมด</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                         <input <?php echo $gruop_8?> value="8" name="usergroup[]" type="checkbox">
                                     </span>
                                    <label class="form-control">ผู้ดูแลฝ่ายวิชาการ</label>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                         <input <?php echo $gruop_9;?> value="9" name="usergroup[]" type="checkbox">
                                     </span>
                                    <label class="form-control">ผู้ดูแลฝ่ายบริหารทรัพยากร</label>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                         <input <?php echo $gruop_10;?> value="10" name="usergroup[]" type="checkbox">
                                     </span>
                                    <label class="form-control">ผู้ดูแลฝ่ายพํฒนากิจการนักเรียนฯ</label>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                         <input <?php echo $gruop_11;?> value="11" name="usergroup[]" type="checkbox">
                                     </span>
                                    <label class="form-control">ผู้ดูแลฝ่ายแผนงานและความร่วมมือ</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{--<label class="col-md-4 control-label">Confirm Password2</label>--}}

                    {{--<div class="col-md-6">--}}
                    {{--<input type="password" class="form-control" name="password_confirmation">--}}
                    {{----}}
                    {{--@if ($errors->has('password_confirmation'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                </div>

                <div class="form-group">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success pull-right">
                                <i class="fa fa-btn fa-user"></i>บันทึก
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection