@extends('site.layouts.master_left_sidebar')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                ประวัติการใช้งาน
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>สถานะ</th>
                            <th>รหัสการบริการ</th>
                            <th><span class="text-nowrap">ที่อยู่ผู้ส่ง</span></th>
                            <th>ที่อยู่ผู้รับ</th>
                            <th>วันที่</th>
                            <th>ลายละเอียด</th>
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
                                <td><a class="btn btn-info" href="{{route('package.history.show',$package->id)}}">ดูลายละเอียด</a></td>

                            </tr>
                            <?php $row_number++?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-xs-12 col-md-12">{{$packages->links()}}</div>
        </div>
    </div>
    @endsection