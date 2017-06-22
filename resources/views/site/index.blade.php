@extends('site.layouts.landing_page_master')
@section('content')
        <div class="landing-block">
            {{--<div class="">--}}
            <div class="col-xs-12 col-md-7">
                {{--<div id="dvMap" style="width:100%; height:500px;"></div>--}}
            </div>
            <div class="col-xs-12 col-md-5">
                <div class="center-div">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                {{--MonsterBike<br>--}}
                                Login
                            </div>
                        </div>
                        <div class="panel-body">
                            @if (Auth::guest())
                                <form style="padding:0 5%;" role="form" method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label class="control-label">Username</label>

                                        {{--<div class="col-md-6">--}}
                                        <input placeholder="Username" class="form-control" name="username" value="{{ old('username') }}">

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                        @endif
                                        {{--</div>--}}
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Password</label>

                                        {{--<div class="col-md-6">--}}
                                        <input placeholder="Password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block text-error">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                        {{--</div>--}}
                                    </div>

                                    {{--<div class="form-group">--}}
                                    {{--<div class="col-md-6 col-md-offset-4">--}}
                                    {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                    {{--<input type="checkbox" name="remember"> Remember Me--}}
                                    {{--</label>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="form-group">
                                        {{--<div class="col-md-12">--}}
                                        <button type="submit" class="btn btn-primary btn-block">
                                            <i class="fa fa-btn fa-sign-in"></i>Login
                                        </button>

                                        {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="form-group">
                                        <div class="text-right">
                                            <a href="{{route('package.search.index')}}">ตรวจสอบการส่งสินค้า</a>
                                            <a href="{{route('member.create')}}">สมัครสมาชิก</a>
                                        </div>
                                        {{--<div class="col-xs-6">--}}

                                        {{--</div>--}}
                                    </div>
                                </form>
                            @else
                                {{Auth::user()->username}}
                                <a href="{{route('package.history.index')}}">ประวัติการใช่บริการ</a>
                                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>ออกจากระบบ</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection

@section('script')
    {{--Google Map Javascript Api--}}
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5p15SZ4mJm6ZqoIa5STnINkW-OcEBNCw&libraries=geometry,places"></script>
    {{--Custom Google map api for this project--}}
    <script src="{{ asset('js/gmap.js')}}"></script>
@endsection