@extends('site.layouts.landing_page_2')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="landing-page2-img hidden-xs hidden-sm col-md-7">
                <img src="{{asset('images/background/246.jpg')}}">
            </div>
            <div class="landing-page2  col-md-5">
                <div class="landing-page2-icon row">
                    <img src="{{asset('images/icons/logo3.svg')}}">
                    <h1 class="landing-page2-logo">Look Around</h1>
                    {{--<h4>"The real king of logistic"</h4>--}}
                </div>
                <div class="row">
                    <div class="landing-page2-login-form col-xs-12">
                        <div class="col-xs-12">

                        </div>
                        <div class="col-xs-12">
                            @if (Auth::guest())
                                <form style="padding:0 5%;" role="form" method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}

                                    {{--User Name--}}
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
                                    {{--Password--}}
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
                                    {{--Login Buttom--}}
                                    <div class="form-group">
                                        {{--<div class="col-md-12">--}}
                                        <button type="submit" class="btn btn-primary btn-block">
                                            <i class="fa fa-btn fa-sign-in"></i>Login
                                        </button>

                                        {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>--}}
                                        {{--</div>--}}
                                    </div>
                                    {{--Link--}}
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
    </div>
    @endsection