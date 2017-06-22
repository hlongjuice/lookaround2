@extends('divisions.layouts.master')
@section('content')
    <div class="m-module-document">
        <div class="m-module-title">
            <h2>เอกสารทั้งหมด</h2>
            <div></div>
        </div>
        <div class="m-module-body">
                <table class="table table-striped">
                    <tr>
                        <th>วันที่</th>
                        <th>รายการ</th>
                        <th>หมวดหมู่</th>
                    </tr>
                    @foreach($documents as $document)
                    <tr>
                        <td>{{$document->updated_at}}</td>
                        <td><a href={{asset($document->file_path)}}>{{$document->title}}</a></td>
                        <td>{{$document->category->title}}</td>
                    </tr>
                    @endforeach
                </table>

        </div>
    </div>
@endsection