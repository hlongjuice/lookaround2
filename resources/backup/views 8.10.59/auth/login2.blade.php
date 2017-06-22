@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Login
        </div>
        <div class="panel-body">

            {{--Form Open--}}
            {{Form::open([
            'url'=>'auth/login',
            'method'=>'POST',
            ])}}
            {{--Username--}}
            <div class="form-group">
                {{Form::label('username','Username')}}
                {{Form::text('username',null,['class'=>'form-control'])}}
            </div>

            {{--Password--}}
            <div class="form-group">
                {{Form::label('password','รหัสผ่าน')}}
                {{Form::password('password',['class'=>'form-control'])}}
            </div>

            {{--Submit--}}
            <div class="form-group">
                {{Form::submit('ล็อกอิน',['class'=>'btn btn-btn-info'])}}
            </div>
        </div>
    </div>
@endsection