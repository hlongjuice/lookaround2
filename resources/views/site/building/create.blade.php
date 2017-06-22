@extends('site.layouts.master_left_sidebar')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
            <div class="form-horizontal">
                {{--Source Input--}}
                <div class="form-group">
                    <label class="control-label col-xs-12 col-md-3">ระบุตำแหน่งที่ต้องการโดยประมาณ</label>
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
                {{--Submit Start Location--}}
                <div class="form-group">
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        {{Form::button('ค้นหาตำแหน่ง',['class'=>'btn btn-success','onclick'=>'setStartLocation()'])}}
                    </div>
                </div>
                <div id="hint"><p>(คลิกบนแผนที่เพื่อระบุตำแหน่งที่ต้องการ)</p></div>
            </div>
            {{--Map--}}
            <div id="dvMap" style="width:100%; height:500px;"></div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            ลายละเอียดสถานที่
        </div>
        <div class="panel-body">
            <form class="form-horizontal" id="addBuildingForm" action="{{route('building.store')}}" method="POST" files='true' enctype="multipart/form-data">
                {{csrf_field()}}
                {{--Building Name--}}
                <div class="form-group">
                    <label for="title" class="control-label col-xs-12 col-md-3">ชื่อสถานที่</label>
                    <div class="col-xs-12 col-md-6">
                        <input id="title" type="text" name="title" class="form-control">
                        <div class="text-danger">{{$errors->first()}}</div>
                    </div>
                </div>
                {{--Building Description--}}
                <div class="form-group">
                    <label for="description" class="control-label col-xs-12 col-md-3">ลายละเอียด</label>
                    <div class="col-xs-12 col-md-6">
                        <textarea class="form-control" name="description" id="description"
                                  form="addBuildingForm"></textarea>
                        <div class="text-danger">{{$errors->first()}}</div>
                    </div>
                </div>
                {{--Image--}}
                <div class="form-group">
                    <label class="col-md-4 control-label" for="image">รูปภาพ</label>
                    <div class="col-md-8">
                        <input name="image" type="file">
                    </div>
                </div>
                {{--Lat Lng--}}
                <div class="hidden form-group">
                    <label class="control-label col-xs-12 col-md-3">ตำแหน่ง</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group row">
                                    <label for="newBuildingLat" class="control-label col-xs-12 col-md-3">ละติจูด</label>
                                    <div class="col-xs-12 col-md-8">
                                        <input id="newBuildingLat" type="text" name="newBuildingLat" class="form-control">
                                        <div class="text-danger">{{$errors->first()}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group row">
                                    <label for="newBuildingLng" class="control-label col-xs-12 col-md-3">ลองติจูด</label>
                                    <div class="col-xs-12 col-md-8">
                                        <input id="newBuildingLng" type="text" name="newBuildingLng" class="form-control">
                                        <div class="text-danger">{{$errors->first()}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Submit--}}
                <div class="form-group">
                    <div class="col-xs-4 pull-right">
                        <button class="btn btn-success btn-block" type="submit">บันทึก</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
@section('side_menu_top')
    {{--@include('site.layouts.icon_details')--}}
@endsection
@section('script')
    <script>

    </script>
@endsection