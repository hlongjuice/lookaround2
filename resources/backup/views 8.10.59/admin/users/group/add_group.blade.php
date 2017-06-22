@extends('admin.layouts.admin_master')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">หมวดหมู่</h3>
        </div>
        <div class="panel-body">
            {{Form::open([
             'route'=>'admin.group.store',
             'method'=>'POST',
             ])}}
                <div class="panel-body">

                    <div class="form-group">
                        {{Form::label('title','ชื่อหมวดหมู่')}}
                        {{Form::text('title'),null,['class'=>'form-control']}}
                    </div>

                    <div class="form-group">
                        {{Form::label('parent_id','หมวดหมู่หลัก')}}
                        {{Form::select('parent_id',$groups,['class'=>'form-control'])}}
                    </div>


                    <div class="form-group">
                        {{Form::submit('บันทึก',['class'=>'btn btn-success'])}}
                    </div>

                </div>
        </div>
    </div>


@endsection