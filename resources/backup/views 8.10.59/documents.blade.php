@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">เอกสารทั้งหมด</div>
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
                    @foreach($documents as $document)
                        <tr>
                            <td>{{$row}}</td>
                            <td class="hidden content-id">{{$document->id}}</td>
                            <td><a href={{$document->file_path}}>{{$document->title}}</a></td>
                            <td>{{$document->category->title}}</td>
                            {{--<td>{{$document->created_at}}</td>--}}
                            <td>{{date('d-m-Y', strtotime($document->created_at))}}</td>
                        </tr>
                        <?php $row++ ?>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
