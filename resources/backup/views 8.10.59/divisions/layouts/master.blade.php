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
    <link href="{{ asset('css/template1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/camera.css') }}" rel="stylesheet">
    <link href="{{ asset('css/news-ticker/marquee.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sliderengine/amazingslider-1.css') }}" rel="stylesheet">


    @yield('add_css')
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
    {{--<script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>--}}

    {{--<script src="{{asset('js/jquery.min.js')}}"></script>--}}
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script src="{{asset('js/image-slider/jquery.mobile.customized.min.js')}}"></script>
    <script src="{{asset('js/image-slider/camera.min.js')}}"></script>
    <script src="{{asset('js/image-slider/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js/news-ticker/marquee.js')}}"></script>
    <script src="{{asset('js/sliderengine/amazingslider.js')}}"></script>
    <script src="{{asset('js/sliderengine/initslider-1.js')}}"></script>



    @yield('script')
</head>
<body>
@include('layouts.sprc_head')
@yield('nav')
@include('layouts.main_menu')
@include('module.module_news_ticker')
<div class="clearfix"></div>


<section class="main-body">
    <div class="container">
        <div class="row">
            {{--Main Content--}}
            <div class="main-content">
                <div class="col-xs-12 col-md-9 col-md-push-3">
                    @yield('content')
                </div>
            </div>


            {{--Side Menu--}}
            <div class="side-menu">
                <div class="col-xs-12 col-md-3 col-md-pull-9">
                    @include('layouts.side_menu')
                    @include('module.module_subdivision')
                    @include('module.module_link')
                    @yield('sidemenu')
                </div>
            </div>

        </div>

    </div>
</section>

<script>

    /*Image Slider*/
//    jQuery(function(){
//
//        jQuery('#camera_wrap_1').camera({
//                thumbnails: true,
//            pagination:false
//        });
//    });

    /*News Ticker*/
    $(function (){
        createMarquee();
    });
</script>

@yield('page-script')

</body>
</html>