@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">กิจกรรมทั้งหมด</div>
        <div class="panel-body">
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการ</th>
                        <th>หมวดหมู่</th>
                        <th>วันที่</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $row=1?>
                    @foreach($activities as $activity)
                        <tr>
                            <td>{{$row}}</td>
                            <td class="hidden content-id">{{$activity->id}}</td>
                            <td><a href={{route('activities.show',$activity->id)}}>{{$activity->title}}</a></td>
                            <td>{{$activity->category->title}}</td>
                            {{--<td>{{$activity->created_at}}</td>--}}
                            <td>{{date('d-m-Y', strtotime($activity->created_at))}}</td>
                        </tr>
                        <?php $row++ ?>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
