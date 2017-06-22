@extends('admin.layouts.admin_master')
@section('nav')
@endsection
@section('content')
    <div class="title clearfix">
        <div class="row">
            <div class="col-xs-12">
                <div  class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ระบบจัดการเว็บไซต์  ฝ่ายแผนงานและความร่วมมือ</h3>
                    </div>
                    <div class="panel-body">

                      {{--Activity--}}
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.activities.index',[$division_id,$activity_id])}}>
                                <div class="icon">
                                    <i class="fa fa-tag"></i>
                                </div>
                                <div class="title">
                                    กิจกรรม
                                </div>
                                <div class="highlight bg-color-green"></div>
                            </a>
                        </div>
                        {{--<div class="col-xs-6 col-md-3 admin-menu">--}}
                            {{--<a href={{route('admin.personnel.index')}}>--}}
                                {{--<div class="icon">--}}
                                    {{--<i class="fa fa-users"></i>--}}
                                {{--</div>--}}
                                {{--<div class="title">--}}
                                    {{--บุคลากร--}}
                                {{--</div>--}}
                                {{--<div class="highlight bg-color-red"></div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.documents.index',21)}}>
                                <div class="icon">
                                    <i class="fa fa-folder"></i>
                                </div>
                                <div class="title">
                                    เอกสาร
                                </div>
                                <div class="highlight bg-color-orange"></div>
                            </a>
                        </div>

                        <div class="clearfix"></div>

                        {{--Advertisement--}}
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.advertisements.index',[$division_id,$advertisement_id])}}>
                                <div class="icon">
                                    <i class="fa fa-folder"></i>
                                </div>
                                <div class="title">
                                    เอกสารประชาสัมพันธ์
                                </div>
                                <div class="highlight bg-color-blue"></div>
                            </a>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="line clearfix">
        <div class="row">
            <div class="col-xs-12">
                <div class="line-dot"></div>
            </div>
        </div>
    </div>
    <div class="module">
        <div class="row">
            <div class="col-xs-12 col-md-6"></div>
            <div class="col-xs-12 col-md-6"></div>

        </div>
    </div>


@endsection
@section('sidemenu')

    {{--@include('admin.layouts.side_menu')--}}

@endsection
