@extends('layouts.master',['news_ticker'=>$news_ticker])
@section('content')
    @include('module.module_image_silder')
    @include('module.module_advertisement')
    {{--@include('module.module_document')--}}
    @include('module.module_activity_blog')
    @include('module.module_rss_feed')
    {{--@include('module.module_activity')--}}
@endsection

