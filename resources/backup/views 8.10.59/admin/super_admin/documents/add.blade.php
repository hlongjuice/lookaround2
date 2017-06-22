@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบเพิ่มเอกสาร</div>
        <div class="panel-body">
            {{Form::open([
            'route'=>'super_admin.documents.store',
            'method'=>'POST',
            'files'=>true
            ])}}

            <div class="col-xs-12 col-md-6 form-group">
                {{Form::label('title','ชื่อเอกสาร')}}
                {{Form::text('title',null,['class'=>'form-control','value'=>old('title')])}}
                <div class="text-danger">{{$errors->first('title')}}</div>
            </div>

            <div class="col-xs-12 col-md-6 form-group">
                {{Form::label('category','หมวดหมู่')}}
                {{Form::select('category',$categories,null,['class'=>'form-control','value'=>old('divisions')])}}
                <div class="text-danger">{{$errors->first('category')}}</div>
            </div>
            <div class="clearfix"></div>

            <div class="col-xs-12 col-md-6 form-group">
                {{Form::label('link','Link Url (*** เลือกใส่ Link URL หรือ อัพโหลดเอกสารเพียงอย่างใดอย่างหนึ่ง)')}}
                {{Form::text('link',null,['class'=>'form-control','value'=>old('link')])}}
            </div>

            <div class="col-xs-12 col-md-6 form-group">
                {{Form::label('file','ไฟล์เอกสาร')}}
                {{Form::file('file')}}

            </div>

            <div class="col-xs-12 col-md-12 form-group">
                <div class="text-danger">{{$errors->first('link')}}</div>
            </div>


            <div class="clearfix"></div>

            <div class="col-xs-12 col-md-6 for form-group">
                {{Form::submit('อัพโหลด',['class'=>'btn btn-success btn-block'])}}
            </div>
        </div>
    </div>
@endsection