@extends('site.layouts.master_left_sidebar')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                สถานที่ทั้งหมด
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รหัสสถานที่</th>
                            <th>ชื่อสถานที่</th>
                            {{--<th><span class="text-nowrap">ที่อยู่ผู้ส่ง</span></th>--}}
                            {{--<th>ที่อยู่ผู้รับ</th>--}}
                            <th>วันที่</th>
                            <th></th>
                            <th></th>
                            {{--<th>ลายละเอียด</th>--}}
                        </tr>
                        </thead>
                        <tbody>

                        <?php $row_number=($buildings->currentPage()*$buildings->perPage())-($buildings->perPage()-1)?>
                        @foreach($buildings as $building)
                            <tr>
                                <td>{{$row_number}}</td>
                                <td>{{$building->code}}</td>
                                <td>{{$building->title}}</td>
                                <td>{{$building->updated_at}}</td>
                                <td><a class="btn btn-info" href="{{route('building.show',$building->id)}}">ดูลายละเอียด</a></td>
                                <td><form onsubmit="return confirm('ต้องการจะลบรายการ ?')" action="{{route('building.destroy',$building->id)}}" method="POST">
                                        <input name="_method" type="hidden" value="delete">
                                        {{csrf_field()}}
                                        <button class="btn btn-danger" type="submit">ลบ</button>
                                    </form></td>

                            </tr>
                            <?php $row_number++?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-xs-12 col-md-12">{{$buildings->links()}}</div>
        </div>
    </div>
@endsection