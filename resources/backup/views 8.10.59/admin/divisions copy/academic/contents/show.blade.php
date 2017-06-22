@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{$content->title}}
        </div>
        <div class="panel-body">
            {!!$content->text!!}
        </div>
    </div>
@endsection