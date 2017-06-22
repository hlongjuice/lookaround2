@extends('layouts.master')
@section('content')
    <div class="m-module-content">
        <div class="m-module-title">
            <h2>กิจกรรมทั้งหมด</h2>
            <div></div>
        </div>
        <div class="m-module-body">
                <table class="table table-striped">
                    <tr>
                        <th>วันที่</th>
                        <th>รายการ</th>
                        <th>หมวดหมู่</th>
                    </tr>
                    @foreach($contents as $content)
                    <tr>
                        <td>{{$content->updated_at}}</td>
                        <td><a href={{route('contents.show',['id'=>$content->id])}}>{{$content->title}}</a></td>
                        <td>{{$content->category->title}}</td>
                    </tr>
                    @endforeach
                </table>

        </div>
    </div>
@endsection