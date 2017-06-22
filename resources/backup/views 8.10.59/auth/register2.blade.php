@extends('layouts.master')
@section('nav')
    @include('coop_division.layouts.navbar')
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Registration
        </div>
        <div class="panel-body">
            {{Form::open([
            'url'=>'auth/register',
            'method'=>'POST',
            'files'=>true
            ])}}

            {{--Username--}}
            <div class="form-group">
                {{Form::label('username','Username')}}
                {{Form::text('username',null,['class'=>'form-control'])}}
                <div class="text-danger">{{$errors->first('username')}}</div>
            </div>

            {{--Password--}}
            <div class="form-group">
                {{Form::label('password','Password')}}
                {{Form::password('password',['class'=>'form-control'])}}
                <div class="text-danger">{{$errors->first('password')}}</div>
            </div>

            {{--Confirm-Password--}}
            <div class="form-group">
                {{Form::label('password_confirmation','Confirm-Password')}}
                {{Form::password('password_confirmation',['class'=>'form-control'])}}
                {{$errors->first('password_confirmation')}}
            </div>

            {{--Name--}}
            <div class="form-group">
                {{Form::label('name','ชื่อ')}}
                {{Form::text('name',null,['class'=>'form-control'])}}
            </div>

            {{--Lastname--}}
            <div class="form-group">
                {{Form::label('lastname','นามสกุล')}}
                {{Form::text('lastname',null,['class'=>'form-control'])}}
            </div>

            {{--Email--}}
            <div class="form-group">
                {{Form::label('email','Email')}}
                {{Form::email('email',null,['class'=>'form-control'])}}
                <div class="text-danger">{{$errors->first('email')}}</div>
            </div>

            {{--Image--}}
            <div class="form-group">
                {{Form::label('image','รูปโปรไฟล์')}}
                {{Form::file('image')}}
            </div>




            {{--Sumbit--}}
            <div class="form-group">
                {{Form::submit('ตกลง',['class'=>'btn btn-success col-xs-12 col-md-4 pull-right'])}}
            </div>

        </div>
    </div>
    @endsection