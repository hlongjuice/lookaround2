@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการเอกสาร {{$division->title}}</div>
        <div class="panel-body">
            {{Form::open([
            'route'=>['admin.documents.update',$division->id,$document->id],
            'method'=>'PATCH',
            'files'=>true
            ])}}

            <div class="col-xs-12 col-md-6 form-group">
                {{Form::label('title','ชื่อเอกสาร')}}
                {{Form::text('title',$document->title,['class'=>'form-control','value'=>old('title')])}}
                <div class="text-danger">{{$errors->first('title')}}</div>
            </div>

            <div class="col-xs-12 col-md-6 form-group">
                {{Form::label('category','หมวดหมู่')}}
                {{Form::select('category',$categories,$document->category_id,['class'=>'form-control','value'=>old('divisions')])}}
                <div class="text-danger">{{$errors->first('divisions')}}</div>
            </div>
            <div class="clearfix"></div>

            <div class="col-xs-12 col-md-8 form-group">
                {{Form::label('file','ไฟล์เดิม')}}
                <input id="file" class="file form-control" name="file" type="text" readonly="readonly"
                       value="{{$document->file_path}}" />
            </div>
            <div class="col-xs-12 col-md-12 form-group">
                {{Form::label('new_file','ไฟล์ใหม่')}}
                {{Form::file('new_file')}}
                <div class="text-danger">{{$errors->first('file')}}</div>
            </div>

            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-4 for form-group">
                {{Form::submit('บันทึก',['class'=>'btn btn-success btn-block'])}}
            </div>
        </div>
    </div>
@endsection
