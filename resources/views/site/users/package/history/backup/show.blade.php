@extends('site.layouts.master_left_sidebar')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                My Tracking
            </div>
        </div>
        <div class="panel-body">
            <div class="form-horizontal">
                <input value="{{$package->lat_start}}" id="txtLatStart" type="text" class="hidden">
                <input value="{{$package->lng_start}}" id="txtLngStart" type="text" class="hidden">
                <input value="{{$package->lat_end}},{{$package->lng_end}}" id="txtDestination" type="text" name="destination" class="hidden">
                <input value="{{$package->staff_lat}},{{$package->staff_lng}}" id="txtSource" type="text" name="txtSource" class="hidden">
                <input hidden value="{{$package->product_weight}}" type="number" id="weight" name="weight" class="hidden">
                <input value="0" type="number" id="weight" name="weight" class="hidden">
            </div>

            <div class="ln_solid"></div>

            <div style="margin-bottom: 10px;" class="col-xs-12 col-md-6">
                <h4>สถานะการจัดส่ง : <span class="label label-{{$package->status->color}}">{{$package->status->title}}</span></h4>
            </div>

            {{--Map--}}
            <div class="row">
                <div id="dvMap" style="width:100%; height:500px;"></div>
            </div>
        </div>
    </div>
    {{--Package Info--}}
    <form id="tracking_form" action="{{route('package.store')}}" method="POST">
        {{csrf_field()}}
        <div style="margin-top:20px;" class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    ลายละเอียด
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
                <table class="table">
                    <tbody>
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
                        <td>ระยะทาง</td>
                        <td><input class="form-control" readonly value=""  name="distance" id="distance" type="text"></td>
                        <td>กิโลเมตร</td>
                    </tr>
                    <tr class="border-none">
                        <td>น้ำหนัก</td>
                        <td><input class="form-control" readonly value=""  name="result_weight" id="result_weight" type="text"></td>
                        <td>กิโลกรัม</td>
                    </tr>
                    {{--Total Price--}}
                    <tr>
                        <td>รวมค่าใช่จ่าย</td>
                        <td><input class="form-control" readonly value=""  name="total_price" id="total_price" type="text"></td>
                        <td>บาท</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{--Driver Info--}}
        @if($package->status_id==1)
            <div class="panel panel-default">
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
            <div class="panel panel-default">
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
        {{--Sender Info--}}
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
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
        {{--Receiver Info--}}
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
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
    </form>
@endsection
@section('script')

    {{--Google Map Javascript Api--}}
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5p15SZ4mJm6ZqoIa5STnINkW-OcEBNCw&libraries=geometry,places"></script>
    {{--Custom Google map api for this project--}}
    <script src="{{ asset('js/gmap.js')}}"></script>
    <script type="text/javascript">
        /*Setting Service Price from database for Calculating*/
        var weight_per_price="{{$package_price->weight_price}}";
        var distance_per_price="{{$package_price->distance_price}}";
//        getRoute();
        getCurrentlyRoute();
    </script>
@endsection