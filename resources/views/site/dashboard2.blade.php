@extends('site.layouts.master_left_sidebar')
@section('content')
    {{--Customer Menu--}}
    <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    ผู้ใช้ทั่วไป
                </div>
            </div>
            <div class="panel-body">
                {{--Tracking--}}
                <div class="col-xs-12 col-md-4 admin-menu">
                    <a href="{{route('package.index')}}">
                        <div class="icon">
                            <img src="{{asset('images/icons/package2.svg')}}">
                            {{--<i class="fa fa-map-marker" aria-hidden="true"></i>--}}
                        </div>
                        <div class="title">
                            ระบุเส้นทางการจัดส่ง
                        </div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div>
                {{--Tracking Histroty--}}
                <div class="col-xs-12 col-md-4 admin-menu">
                    <a href="{{route('package.history.index')}}">
                        <div class="icon">
                            <img src="{{asset('images/icons/tracking_history.svg')}}">
                            {{--<i class="fa fa-bookmark"></i>--}}
                        </div>
                        <div class="title">
                            ประวัติการใช้บริการ
                        </div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div>

            </div>
        </div>
    {{--Driver Menu--}}
    @if(in_array(Auth::user()->member_type_id,[2,3]) )
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                ผู้ส่งของ
            </div>
        </div>
        <div class="panel-body">
                {{--Service Order--}}
                <div class="col-xs-12 col-md-4 admin-menu">
                    <a href="{{route('driver.package.index')}}">
                        <div class="icon">
                            <img src="{{asset('images/icons/service.svg')}}">
                            {{--<i class="fa fa-bookmark"></i>--}}
                        </div>
                        @if($package_count>0)
                        <div class="notify">
                            {{--<img src="{{asset('images/icons/notify.svg')}}">--}}
                            <span class="notify-number">{{$package_count}}</span>
                        </div>
                        @endif
                        <div class="title">
                            รายการนำส่ง
                        </div>
                        <div class="highlight bg-color-orange"></div>
                    </a>
                </div>
                {{--Service History--}}
                <div class="col-xs-12 col-md-4 admin-menu">
                    <a href="{{route('driver.package.service_history.index')}}">
                        <div class="icon">
                            <img src="{{asset('images/icons/service_history2.svg')}}">
                            {{--<i class="fa fa-bookmark"></i>--}}
                        </div>
                        <div class="title">
                            ประวัติการให้บริการ
                        </div>
                        <div class="highlight bg-color-orange"></div>
                    </a>
                </div>
        </div>
    </div>
    @endif
    {{--Admin Menu--}}
    @if(Auth::user()->member_type_id==3)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                ผู้ดูแลระบบ
            </div>
        </div>
        <div class="panel-body">
            {{--All Packages--}}
            <div class="col-xs-12 col-md-4 admin-menu">
                <a href="{{route('admin.package.index')}}">
                    <div class="icon">
                        <img src="{{asset('images/icons/all_package.svg')}}">
                        {{--<i class="fa fa-bookmark"></i>--}}
                    </div>
                    <div class="title">
                        รายการนำส่งทั้งหมด
                    </div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>
            {{--Package-Price--}}
            <div class="col-xs-12 col-md-4 admin-menu">
                <a href="{{route('admin.package_price.edit',$package_price->id)}}">
                    <div class="icon">
                        <img src="{{asset('images/icons/gear.svg')}}">
                        {{--<i class="fa fa-bookmark"></i>--}}
                    </div>
                    <div class="title">
                        ตั้งราคาค่าบริการ
                    </div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>
            {{--Clear Fix--}}
            <div class="clearfix"></div>
            {{--Add New Member--}}
            <div class="col-xs-12 col-md-4 admin-menu">
                <a href="{{route('admin.members.create')}}">
                    <div class="icon">
                        <img src="{{asset('images/icons/user.svg')}}">
                        {{--<i class="fa fa-bookmark"></i>--}}
                    </div>
                    <div class="title">
                        เพิ่มผู้ใช้งาน
                    </div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>
            {{--View All Members--}}
            <div class="col-xs-12 col-md-4 admin-menu">
                <a href="{{route('admin.members.index')}}">
                    <div class="icon">
                        <img src="{{asset('images/icons/group.svg')}}">
                        {{--<i class="fa fa-bookmark"></i>--}}
                    </div>
                    <div class="title">
                        ข้อมูลสมาชิกทั้งหมด
                    </div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>

        </div>
    </div>
    @endif
@endsection