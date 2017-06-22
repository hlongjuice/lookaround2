@extends('admin.layouts.master_left_sidebar')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                อัตราค่าบริการ
            </div>
        </div>
        <div class="panel-body">

            <form class="form-horizontal" method="POST" action="{{route('admin.package_price.update',$package_price->id)}}" accept-charset="UTF-8">
                <input name="_method" type="hidden" value="PUT">
                {{csrf_field()}}
                {{--Start Price--}}
                <div class="form-group">
                    <label for="start_price" class="control-label col-xs-12 col-md-3">อัตราค่าบริการเริ่มต้น</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="input-group">
                            <input  value="{{$package_price->start_price}}" id="start_price" name="start_price" class="form-control">
                            <div class="input-group-addon">บาท</div>
                        </div>
                        <div class="text-danger">{{$errors->first('start_price')}}</div>
                    </div>
                </div>

                {{--Weight Price--}}
                <div class="form-group">
                    <label for="weight_price" class="control-label col-xs-12 col-md-3">อัตราค่าบริการต่อน้ำหนัก</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="input-group">
                            <input  value="{{$package_price->weight_price}}" id="weight_price" name="weight_price" class="form-control">
                            <div class="input-group-addon">บาท/กก.</div>
                        </div>
                        <div class="text-danger">{{$errors->first('weight_price')}}</div>
                    </div>
                </div>
                {{--Distance Price--}}
                <div class="form-group">
                    <label for="distance_price" class="control-label col-xs-12 col-md-3">อัตราค่าบริการต่อระยะทาง</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="input-group">
                            <input value="{{$package_price->distance_price}}" id="distance_price" name="distance_price" class="form-control">
                            <div class="input-group-addon">บาท/กม.</div>
                        </div>
                        <div class="text-danger">{{$errors->first('distance_price')}}</div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <button class="btn btn-success" type="submit">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
@endsection