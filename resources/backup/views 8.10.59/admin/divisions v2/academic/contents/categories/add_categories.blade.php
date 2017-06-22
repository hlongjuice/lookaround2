@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel panel-heading">
            เพิ่มหมวดหมู่
        </div>
        {{Form::open([
        'route'=>'admin.categories.store',
        'method'=>'POST',
        ])}}
        <div class="panel-body">

            <div class="form-group">
                {{Form::label('title','ชื่อหมวดหมู่')}}
                {{Form::text('title'),null,['class'=>'form-control']}}
            </div>

            <div class="form-group">
                {{Form::label('parent_id','หมวดหมู่หลัก')}}
                {{Form::select('parent_id',$categories,['class'=>'form-control'])}}
            </div>


            <div class="form-group">
                {{Form::submit('บันทึก',['class'=>'btn btn-success'])}}
            </div>

        </div>

    </div>
@endsection