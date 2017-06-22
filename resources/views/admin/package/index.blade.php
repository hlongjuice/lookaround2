@extends('admin.layouts.master_left_sidebar')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                แพคเกจ
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>สถานะ</th>
                            <th>รหัสการใช้บริการ</th>
                            <th>ที่อยู่ผู้ส่ง</th>
                            <th>ที่อยู่ผู้รับ</th>
                            <th>วันที่</th>
                            <th>ลายละเอียด</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php $row_number=($packages->currentPage()*$packages->perPage())-($packages->perPage()-1)?>
                    @foreach($packages as $package)
                        <tr>
                            <td>{{$row_number}}</td>
                            <td><h4><span class="label label-{{$package->status->color}}">{{$package->status->title}}</span></h4></td>
                            <td>{{$package->service_id}}</td>
                            <td>{{$package->sender_address}}</td>
                            <td>{{$package->receiver_address}}</td>
                            <td>{{$package->updated_at}}</td>
                            <td><a href="{{route('admin.package.show',$package->id)}}" class="btn btn-info">ดูลายละเอียด</a></td>
                            <td><form onsubmit="return confirm('ต้องการจะลบรายการ ?')" action="{{route('admin.package.destroy',$package->id)}}" method="POST">
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
            <div class="col-xs-12 col-md-12">{{$packages->links()}}</div>
        </div>
    </div>
    @endsection