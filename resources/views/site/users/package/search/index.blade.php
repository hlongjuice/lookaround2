@extends('site.layouts.master_one_content')
@section('nav-bar')
    @include('site.layouts.nav_bar')
    @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        ตรวจสอบการส่งสินค้า
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="{{route('package.search.search')}}" method="GET">
                            {{csrf_field()}}
                            <div class="form-group">
                                {{--<div class="input-group">--}}
                                    <label class="sr-only" for="search"></label>
                                <div class="col-xs-8 col-md-offset-3 col-md-5">
                                    <input placeholder="Service ID" type="text" id="search" name="service_id" class="form-control">
                                    <div class="text-danger">{{$errors->first('service_id')}}</div>
                                    <div class="text-danger">{{$errors->first('service')}}</div>
                                </div>
                                    <button type="submit" class="col-xs-2 col-md-2 btn btn-success">ค้นหา</button>
                                {{--</div>--}}
                            </div>
                            <div class="form-group">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection