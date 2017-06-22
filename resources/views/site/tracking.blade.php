  @extends('site.layouts.master_left_sidebar')
@section('content')
    <div>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panel-title">
                    My Tracking
                </div>
            </div>

            <div class="panel-body">
                <div class="form-horizontal">

                    {{--Source Input--}}
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-md-3">ต้นทาง</label>
                            <div class="col-xs-12 col-md-6">
                                <input id="txtSource" type="text" name="start" class="form-control">

                            </div>
                            <div class="col-xs-12 col-md-3">
                                <button onclick="getCurrentSource()" type="button" class="btn btn-info">
                                    ที่อยู่ปัจจุบัน
                                    <i id="position_loading" style="display:none;" class="fa fa-spinner fa-spin fa-fw"></i>
                                </button>

                            </div>
                        </div>

                    {{--Destination Input--}}
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-md-3">ปลายทาง</label>
                            <div class="col-xs-12 col-md-6">
                                <input id="txtDestination" type="text" name="destination" class="form-control">
                                <div class="text-danger">{{$errors->first()}}</div>
                            </div>
                        </div>
                    <div class="form-inline">
                    </div>

                    {{--Product Weight Input--}}
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3">น้ำหนักสินค้าโดยประมาณ</label>
                        <div class="col-xs-12 col-md-6">
                            <div class="input-group">
                                <input value="0" type="number" id="weight" name="weight" class="form-control">
                                <div class="input-group-addon">กก.</div>
                            </div>
                        </div>
                    </div>

                    {{--Detail--}}
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3">ลายละเอียด</label>
                        <div class="col-xs-12 col-md-6">
                            <textarea id="detail" name="detail" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>

                    {{--Calculate Directions--}}
                    <div class="form-group">
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            {{Form::button('ค้นหาเส้นทาง',['class'=>'btn btn-success','onclick'=>'getRoute()'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="dvMap" style="width:100%; height:500px;"></div>
                </div>
            </div>
    </div>
        {{--Result Grid--}}
        <div class="row">

            {{--Distance--}}
            <div class="col-xs-12 col-md-6">
                <div class="result-grid result-bg-info">
                    <div class="icon">
                        <img src="{{asset('images/icons/distance.svg')}}">
                        {{--<i class="fa fa-bookmark" aria-hidden="true"></i>--}}
                    </div>
                    <div class="visible-xs line"></div>
                    <div class="title">
                        <div id="result-grid-distance"></div>
                        <span>ระยะทาง</span>
                    </div>
                </div>
            </div>
            {{--Price--}}
            <div class="col-xs-12 col-md-6">
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
                    <div class="panel-heading">
                        <div class="panel-title">
                            ผลลัพธ์
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

                        {{--Results Tables--}}
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
                                <td>ระยะทาง</td>
                                <td><input class="form-control" readonly value=""  name="distance" id="distance" type="text"></td>
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
                                    <input value="{{Auth::user()->name}} {{Auth::user()->surname}}" id="sender_name" type="text" name="sender_name" class="form-control">
                                    <div class="text-danger">{{$errors->first()}}</div>
                                </div>
                            </div>
                            {{--Phone--}}
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-md-3">เบอร์โทร</label>
                                <div class="col-xs-12 col-md-6">
                                    <input value="{{Auth::user()->tel}}" id="sender_phone" type="text" name="sender_phone" class="form-control">
                                    <div class="text-danger">{{$errors->first()}}</div>
                                </div>
                            </div>
                            {{--Address--}}
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-md-3">ที่อยู่</label>
                                <div class="col-xs-12 col-md-6">
                                    <textarea class="form-control" name="sender_address" id="sender_address" form="tracking_form"></textarea>
                                    <div class="text-danger">{{$errors->first()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <input id="receiver_name" type="text" name="receiver_name" class="form-control">
                                    <div class="text-danger">{{$errors->first()}}</div>
                                </div>
                            </div>
                            {{--Phone--}}
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-md-3">เบอร์โทร</label>
                                <div class="col-xs-12 col-md-6">
                                    <input id="receiver_phone" type="text" name="receiver_phone" class="form-control">
                                    <div class="text-danger">{{$errors->first()}}</div>
                                </div>
                            </div>
                            {{--Address--}}
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-md-3">ที่อยู่</label>
                                <div class="col-xs-12 col-md-6">
                                    <textarea class="form-control" name="receiver_address" id="receiver_address" form="tracking_form"></textarea>
                                    <div class="text-danger">{{$errors->first()}}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <button style="margin-bottom: 25px;" class="col-xs-12 col-md-offset-9 col-md-3 btn btn-success" type="submit">ยืนยันรายการ</button>
                </div>
            </form>
    </div>
@endsection
@section('side_menu_top')
    @include('site.layouts.icon_details')
    @endsection
@section('script')
    <script>
        /*Setting Service Price from database for Calculating*/
        var start_price="{{$package_price->start_price}}";
        var weight_per_price="{{$package_price->weight_price}}";
        var distance_per_price="{{$package_price->distance_price}}";
        var home_icon={
            url:'{{asset('images/map-icon/home3.svg')}}'
        };
        var driver_icon={
            url:'{{asset('images/map-icon/package2.svg')}}'
        }
    </script>
@endsection