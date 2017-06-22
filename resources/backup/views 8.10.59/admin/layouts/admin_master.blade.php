<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.theme.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.structure.min.css')}}" rel="styleshhet">
    <link href="{{ asset('css/srpc.css')}}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet">
    @yield('add_css')
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    <![endif]-->
    <script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
    @yield('script')
</head>
<body>

@include('layouts.sprc_head')
{{--@include('layouts.navbar')--}}
@include('admin.layouts.main_menu')
@yield('nav')
<section class="main-body">
    <div class="container">
        <div class="row">
            {{--Main Content--}}
            <div class="main-content">
                <div class="col-md-9 col-md-push-3">
                    @yield('content')
                </div>
            </div>


            {{--Side Menu--}}
            <div class="side-menu">
                <div class="col-md-3 col-md-pull-9">
                    @if(Auth::check())
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Admin
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-xs-12">
                                    {{Auth::user()->name}}
                                </div>
                                <div class="col-xs-12">
                                    <a href="{{route('admin.users.edit',Auth::user()->id)}}">แก้ไขข้อมูลส่วนตัว</a>
                                </div>
                                <div class="col-xs-12">
                                    <a href="{{route('admin.password.edit',Auth::user()->id)}}">แก้ไขรหัสผ่าน</a>
                                </div>

                            </div>
                            <div class="panel-footer">
                                {{--<a class="btn btn-danger btn-sm btn-block" href={{url('/logout')}}>ออกจากระบบ</a>--}}
                                <a class="btn btn-danger btn-sm btn-block" href={{url('/logout')}}>ออกจากระบบ</a>
                            </div>
                        </div>

                        <?php
                        foreach(Auth::user()->usergroups as $usergroup)
                            $group[]=$usergroup->id;
                        ?>

                        <?php
                        if(in_array('7',$group)){
                            ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">ระบบจัดการสมาชิก</h3>
                            </div>
                            <div class="panel-body">
                                <a href={{route('admin.users.index')}}>รายชื่อสมาชิก</a>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                        <?php }?>
                    @endif
                    @yield('sidemenu')
                </div>
            </div>


        </div>

    </div>
</section>


@yield('page-script')

</body>
</html>