@extends('admin.layouts.master_left_sidebar')
@section('content')
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">

                </div>
            </div>
            <div class="panel-body">
                {{--Service Order--}}
                <div class="col-xs-6 col-md-4 admin-menu">
                    <a href="{{route('admin.package.index')}}">
                        <div class="icon">
                            <i class="fa fa-bookmark"></i>
                        </div>
                        <div class="title">
                            Service Order
                        </div>
                        <div class="highlight bg-color-orange"></div>
                    </a>
                </div>
                {{--Package-Price--}}
                <div class="col-xs-6 col-md-4 admin-menu">
                    <a href="{{route('admin.package_price.edit',$package_price->id)}}">
                        <div class="icon">
                            <i class="fa fa-bookmark"></i>
                        </div>
                        <div class="title">
                            ตั้งราคาค่าบริการ
                        </div>
                        <div class="highlight bg-color-orange"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endsection