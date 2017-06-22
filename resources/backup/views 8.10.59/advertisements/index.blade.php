@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">เอกสารประชาสัมพันธ์ทั้งหมด</div>
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
                    @foreach($advertisements as $advertisement)
                        <tr>
                            <td>{{$row}}</td>
                            <td class="hidden content-id">{{$advertisement->id}}</td>
                            <td><a href="{{asset($advertisement->file_path)}}">{{$advertisement->title}}</a></td>
                            <td>{{$advertisement->category->title}}</td>
                            {{--<td>{{$advertisement->created_at}}</td>--}}
                            <td>{{date('d-m-Y', strtotime($advertisement->created_at))}}</td>
                        </tr>
                        <?php $row++ ?>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
