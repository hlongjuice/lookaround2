@extends('layouts.master',['news_ticker'=>$news_ticker])
@section('content')
    <div class="m-module-content">
        <div class="m-module-title">
            <h3>{{$content->title}}</h3>
        </div>
        <div class="m-module-body">
            {!! $content->text!!}
        </div>
    </div>
@endsection