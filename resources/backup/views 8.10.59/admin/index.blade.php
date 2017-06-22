@extends('admin.layouts.admin_master')
@section('nav')
    @endsection
@section('content')
    <div class="title clearfix">
        <div class="row">
            <div class="col-xs-12">
                <div  class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ระบบจัดการเว็บไซต์</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            foreach(Auth::user()->usergroups as $usergroup)
                                $group[]=$usergroup->id;
                        ?>


                        <?php
                            if(in_array('7',$group) or in_array('8',$group)){
                        ?>
                        {{--Academic Division--}}
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.divisions.academic.index')}}>
                                <div class="icon">
                                    <i class="fa fa-bookmark"></i>
                                </div>
                                <div class="title">
                                    ฝ่ายวิชาการ
                                </div>
                                <div class="highlight bg-color-blue"></div>
                            </a>
                        </div>
                            <?php } ?>

                            <?php if(in_array('7',$group) or in_array('9',$group)){?>
                        {{--Manage Division--}}
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.divisions.management.index')}}>
                                <div class="icon">
                                    <i class="fa fa-bookmark-o"></i>
                                </div>
                                <div class="title">
                                    ฝ่ายบริหารทรัพยากร
                                </div>
                                <div class="highlight bg-color-green"></div>
                            </a>
                        </div>
                            <?php }?>

                            <?php if(in_array('7',$group) or in_array('10',$group)){?>
                        {{--Develop Division--}}
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.divisions.development.index')}}>
                                <div class="icon">
                                    <i class="fa fa-bookmark"></i>
                                </div>
                                <div class="title">
                                    ฝ่ายพัฒนากิจการนักเรียนนักศึกษา
                                </div>
                                <div class="highlight bg-color-red"></div>
                            </a>
                        </div>
                            <?php }?>

                            <?php if(in_array('7',$group) or in_array('11',$group)){?>
                        {{--Plans Division--}}
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.divisions.plans.index')}}>
                                <div class="icon">
                                    <i class="fa fa-bookmark-o"></i>
                                </div>
                                <div class="title">
                                    ฝ่ายแผนงานและความร่วมมือ
                                </div>
                                <div class="highlight bg-color-orange"></div>
                            </a>
                        </div>
                            <?php }?>

                        {{--Clear Fix--}}
                        <div class="clearfix"></div>

                            {{--Only Master Admin can see this--}}
                            <?php if(in_array('7',$group)){?>
                        {{--News Ticker--}}
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.news_ticker.edit',8)}}>
                                <div class="icon">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </div>
                                <div class="title">
                                    ข้อความวิ่ง
                                </div>
                                <div class="highlight bg-color-orange"></div>
                            </a>
                        </div>

                        {{--Image Slider--}}
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.image_slider.index')}}>
                                <div class="icon">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                </div>
                                <div class="title">
                                    สไลด์รูปภาพ
                                </div>
                                <div class="highlight bg-color-orange"></div>
                            </a>
                        </div>

                        {{--@endif--}}

                        {{--User Manament--}}
                    {{--    <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.image_slider.index')}}>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="title">
                                    ระบบจัดการสมาชิก
                                </div>
                                <div class="highlight bg-color-orange"></div>
                            </a>
                        </div> --}}

                        <div class="clearfix"></div>


                        {{--Old Menu --}}
                        {{--<div class="col-xs-6 col-md-3 admin-menu">--}}
                            {{--<a href={{route('admin.contents.index')}}>--}}
                                {{--<div class="icon">--}}
                                    {{--<i class="fa fa-pencil-square-o"></i>--}}
                                {{--</div>--}}
                                {{--<div class="title">--}}
                                    {{--บทความ--}}
                                {{--</div>--}}
                                {{--<div class="highlight bg-color-blue"></div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.categories.index')}}>
                                <div class="icon">
                                    <i class="fa fa-tag"></i>
                                </div>
                                <div class="title">
                                    หมวดหมู่
                                </div>
                                <div class="highlight bg-color-green"></div>
                            </a>
                        </div>
                         <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('admin.personnel.index')}}>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="title">
                                    บุคลากร
                                </div>
                                <div class="highlight bg-color-red"></div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-3 admin-menu">
                            <a href={{route('super_admin.documents.index')}}>
                                <div class="icon">
                                    <i class="fa fa-folder"></i>
                                </div>
                                <div class="title">
                                    เอกสาร
                                </div>
                                <div class="highlight bg-color-orange"></div>
                            </a>
                        </div>

                            <div class="col-xs-6 col-md-3 admin-menu">
                                <a href={{route('super_admin.school_info.index')}}>
                                    <div class="icon">
                                        <i class="fa fa-folder"></i>
                                    </div>
                                    <div class="title">
                                        ข้อมูลสถานศึกษา
                                    </div>
                                    <div class="highlight bg-color-orange"></div>
                                </a>
                            </div>

                            {{--End Master Admin--}}
                            <?php }?>





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
