@extends('site.layouts.master_left_sidebar')
@section('content')
    <div class="hidden panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
               สถานะการจัดส่ง
            </div>
        </div>
        <form method="post" action="{{route('driver.package.update',$package->id)}}">
            <input value="PUT" type="hidden" name="_method" >
            {{csrf_field()}}

            <div class="panel-body">
                <h4><span class="label label-{{$package->status->color}}">{{$package->status->title}}</span></h4>
                <div class=" input">


                    {{--LatLng Start Position--}}
                    <input value="{{$package->lat_start}}" id="txtLatStart" type="text" class="hidden">
                    <input value="{{$package->lng_start}}" id="txtLngStart" type="text" class="hidden">

                    {{--Start Position--}}
                    @if(in_array($package->status_id,[1,2]))
                        <input value="{{$package->lat_start}},{{$package->lng_start}}" id="txtSource" type="text" name="txtSource" class="hidden">
                    @elseif(in_array($package->status_id,[3,4]))
                        <input value="{{$package->staff_lat}},{{$package->staff_lng}}" id="txtSource" type="text" name="txtSource" class="hidden">
                    @endif

                    {{--Destination Position--}}
                    <input value="{{$package->lat_end}},{{$package->lng_end}}" id="txtDestination" type="text" name="destination" class="hidden">

                    {{--Product Weight--}}
                    <input value="{{$package->product_weight}}" type="number" id="weight" name="weight" class="hidden">

                    {{--Result Position--}}
                    <input id="input_origin" value="{{$package->staff_lat}},{{$package->staff_lng}}" class="hidden">
                    <input id="input_destination" value="{{$package->lat_start}},{{$package->lng_start}}" class="hidden">
                    <input type="text" value="{{$package->staff_lat}}" id="driver_position_lat" name="driver_position_lat" class="hidden" >
                    <input type="text" value="{{$package->staff_lng}}" id="driver_position_lng" name="driver_position_lng" class="hidden">

                </div>
                <div class="ln_solid"></div>
                {{--Sender Location--}}
                @if($package->status_id==2)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                               ตำแหน่งรถสินค้าและจุดรับสินค้า
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div id="processTwoMap" style="width:100%; height:500px;"></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </form>

    </div>

    {{--Direction Map--}}
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                ตำแหน่งและเส้นทางการส่งสินค้า
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div id="dvMap" style="width:100%; height:500px;"></div>
            </div>
        </div>
    </div>
    {{--Result Grid--}}
    <div class="row">
        {{--Status--}}
        <div class="col-xs-12 col-md-4">
            <div class="result-grid result-bg-{{$package->status->color}}">
                <div class="icon">
                    <img src="{{asset('images/icons/status.svg')}}">
                    {{--<i class="fa fa-bookmark" aria-hidden="true"></i>--}}
                </div>
                <div class="visible-xs line"></div>
                <div class="title">
                    {{$package->status->title}}
                    <span>สถาณะการจัดส่ง</span>
                </div>
            </div>
        </div>
        {{--Distance--}}
        <div class="col-xs-12 col-md-4">
            <div class="result-grid result-bg-info">
                <div class="icon">
                    <img src="{{asset('images/icons/distance.svg')}}">
                    {{--<i class="fa fa-bookmark" aria-hidden="true"></i>--}}
                </div>
                <div class="visible-xs line"></div>
                <div class="title">
                    <div id="result-grid-distance"></div>
                    <span>ระยะทางคงเหลือ</span>
                </div>
            </div>
        </div>
        {{--Price--}}
        <div class="col-xs-12 col-md-4">
            <div class="result-grid result-bg-success">
                <div class="icon">
                    <img src="{{asset('images/icons/thai-baht.svg')}}">
                    {{--<i class="fa fa-bookmark" aria-hidden="true"></i>--}}
                </div>
                <div class="visible-xs line"></div>
                <div class="title">
                    <div id="result-grid-totalPrice"></div>
                    <span>ราคาโดยประมาณ</span>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    {{--Package Info--}}
    <div class="row">
        <div class="hidden-xs col-md-8 ">
            <div style="margin-top:15px;" class="line-dot "></div>
        </div>
        <div class="col-xs-12 col-md-4">
            <button style="margin-bottom: 10px;" class="btn btn-info btn-block" data-toggle="collapse" data-target="#price-details" type="button">แสดงลายละเอียดทั้งหมด</button>
        </div>
    </div>
    <form id="tracking_form" action="{{route('package.store')}}" method="POST">
        {{csrf_field()}}
        <div class="collapse" id="price-details">
            <div style="margin-top:20px;" class="panel panel-default">
                <div class="col-xs-12 panel-heading">
                    <div class="row">
                        <div class="panel-title">
                            <div class="col-xs-12 col-md-8">
                                <p>ลายละเอียด</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    {{--Lat/Lng--}}
                    <table class="hidden table">
                        <thead>
                        <tr class="active">
                            <th></th>
                            <th>ละติจูด</th>
                            <th>ลองติจูด</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>ต้นทาง</td>
                            <td><input class="form-control" readonly value=""  name="lat_start" id="lat_start" type="text"></td>
                            <td><input class="form-control" readonly value=""  name="lng_start" id="lng_start" type="text"></td>
                        </tr>
                        <tr>
                            <td>ปลายทาง</td>
                            <td> <input class="form-control" readonly value=""  name="lat_end" id="lat_end" type="text"></td>
                            <td><input class="form-control" readonly value=""  name="lng_end" id="lng_end" type="text"></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="line-dot"></div>
                    {{--Result Table--}}
                    <table class="table">
                        <tbody>
                        {{--Start Price--}}
                        <tr class="border-none">
                            <td>อัตรค่าบริการเริ่มต้น</td>
                            <td><input class="form-control" readonly value="{{$package_price->start_price}}"  name="start_price" id="start_price" type="text"></td>
                            <td>บาท</td>
                        </tr>
                        {{--Distance Per Price--}}
                        <tr class="border-none">
                            <td>อัตรค่าบริการต่อระยะทาง</td>
                            <td><input class="form-control" readonly value="{{$package_price->distance_price}}"  name="distance_price" id="distance_price" type="text"></td>
                            <td>บาท/กม.</td>
                        </tr>
                        {{--Distance Per Weight--}}
                        <tr class="border-none">
                            <td>อัตรค่าบริการต่อน้ำหนัก</td>
                            <td><input class="form-control" readonly value="{{$package_price->weight_price}}"  name="weight_price" id="weight_price" type="text"></td>
                            <td>บาท/กก.</td>
                        </tr>
                        {{--Distance--}}
                        <tr>
                            <td>ระยะทางทั้งหมด</td>
                            <td><input class="form-control" readonly value=""  name="distance" id="distance" type="text"></td>
                            <td>กิโลเมตร</td>
                        </tr>
                        {{--Distance--}}
                        <tr class="border-none">
                            <td>ระยะทางคงเหลือ</td>
                            <td><input class="form-control" readonly value=""  name="current_distance" id="current_distance" type="text"></td>
                            <td>กิโลเมตร</td>
                        </tr>
                        {{--Product Weight--}}
                        <tr class="border-none">
                            <td>น้ำหนัก</td>
                            <td><input class="form-control" readonly value=""  name="result_weight" id="result_weight" type="text"></td>
                            <td>กิโลกรัม</td>
                        </tr>
                        {{--Total Price--}}
                        <tr class="bg-success total-payment">
                            <td><img style="float: left; margin-right:10px;"  src="{{asset('images/icons/total_payment.svg')}}"><span>ราคาโดยประมาณ</span></td>
                            <td><input class="form-control" readonly value=""  name="total_price" id="total_price" type="text"></td>
                            <td>บาท</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        {{--Driver Info--}}
        @if($package->status_id==1)
            <div class="hidden panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        ข้อมูลคนส่งของ
                    </div>
                </div>
                <div class="panel-body">
                    <p>รอการติดต่อกลับจากผู้ให้บริการ</p>
                </div>
            </div>
        @else
            <div class="hidden panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        ข้อมูลคนส่งของ
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        {{--Name--}}
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-md-3">ชื่อ/สกุล</label>
                            <div class="col-xs-12 col-md-6">
                                <input readonly value="{{$driver->name}}" id="driver_name" type="text" name="driver_name" class="form-control">
                            </div>
                        </div>
                        {{--Phone--}}
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-md-3">เบอร์โทร</label>
                            <div class="col-xs-12 col-md-6">
                                <input readonly value="{{$driver->surname}}" id="driver_phone" type="text" name="driver_phone" class="form-control">
                            </div>
                        </div>
                        {{--Address--}}
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-md-3">ที่อยู่</label>
                            <div class="col-xs-12 col-md-6">
                                <textarea readonly value="{{$driver->address}}" class="form-control" name="driver_address" id="driver_address" form="tracking_form"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-md-6">
                {{--Sender Info--}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="tracking-address panel-title">
                            <img src="{{asset('images/map-icon/package2.svg')}}">
                             ข้อมูลผู้ส่ง
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-horizontal">
                            {{--Name--}}
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-md-3">ชื่อ/สกุล</label>
                                <div class="col-xs-12 col-md-6">
                                    <input readonly value="{{$package->sender}}" id="sender_name" type="text" name="sender_name" class="form-control">
                                </div>
                            </div>
                            {{--Phone--}}
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-md-3">เบอร์โทร</label>
                                <div class="col-xs-12 col-md-6">
                                    <input readonly value="{{$package->sender_phone}}" id="sender_phone" type="text" name="sender_phone" class="form-control">
                                </div>
                            </div>
                            {{--Address--}}
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-md-3">ที่อยู่</label>
                                <div class="col-xs-12 col-md-6">
                                    <textarea  readonly class="form-control" name="sender_address" id="sender_address" form="tracking_form">{{$package->sender_address}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                {{--Receiver Info--}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="tracking-address panel-title">
                            <img src="{{asset('images/map-icon/home3.svg')}}">
                             ข้อมูลผู้รับ
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-horizontal">
                            {{--Name--}}
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-md-3">ชื่อ/สกุล</label>
                                <div class="col-xs-12 col-md-6">
                                    <input readonly value="{{$package->receiver}}" id="receiver_name" type="text" name="receiver_name" class="form-control">
                                </div>
                            </div>
                            {{--Phone--}}
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-md-3">เบอร์โทร</label>
                                <div class="col-xs-12 col-md-6">
                                    <input readonly value="{{$package->receiver_phone}}" id="receiver_phone" type="text" name="receiver_phone" class="form-control">
                                </div>
                            </div>
                            {{--Address--}}
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-md-3">ที่อยู่</label>
                                <div class="col-xs-12 col-md-6">
                                            <textarea readonly class="form-control" name="receiver_address" id="receiver_address" form="tracking_form">{{$package->receiver_address}}
                                            </textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('side_menu_top')
    @include('site.layouts.icon_details')
    @if($package->status_id!=1)
    @include('site.layouts.driver_info')
    @endif
@endsection
@section('script')
    <script type="text/javascript">
        var driver_icon=null;
        var driver_marker_move=false;
        var destination_marker_move=false;
        /*Setting Service Price from database for Calculating*/
        var start_price="{{$package_price->start_price}}";
        var weight_per_price="{{$package_price->weight_price}}";
        var distance_per_price="{{$package_price->distance_price}}";
        var home_icon={
            url:'{{asset('images/map-icon/home3.svg')}}'
        };
        var p2_driver_icon={
            url:'{{asset('images/map-icon/delivery-truck.svg')}}'
        };
        var package_icon={
            url:'{{asset('images/map-icon/package2.svg')}}'
        };

        if('{{$package->status_id}}'==1 || '{{$package->status_id}}'==2){
            driver_icon={
                url:'{{asset('images/map-icon/package2.svg')}}'
            };
        }
        else if('{{$package->status_id}}'==3){
            driver_icon={
                url:'{{asset('images/map-icon/delivery-truck.svg')}}'
            };
        }
        else{
            driver_icon={
                url:'{{asset('images/map-icon/success.svg')}}'
            }
        }
        getRoute();
        if('{{$package->status_id}}'==2){
            var p2_driver_marker_move=false;
            getProcessTwoRoute();
        }
    </script>
@endsection