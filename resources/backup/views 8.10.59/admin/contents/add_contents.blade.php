@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการบทความ</div>
        <div class="panel-body">
            {{Form::open([
            'route'=>'admin.contents.store',
            'method'=>"POST",
            'files'=>true
            ])}}

            {{--Title--}}
            <div class="form-group">
                {{Form::label('title','หัวเรื่อง')}}
                {{Form::text('title',null,['class'=>'form-control','value'=>old('title')])}}
                <div class="text-danger">{{$errors->first('title')}}</div>
            </div>

            {{--Categories--}}
            <div class="form-group">
                {{Form::label('category','หมวดหมู่')}}
                {{Form::select('category',$categories,['class'=>'form-control'])}}
                <div class="text-danger">{{$errors->first('category')}}</div>
            </div>

            {{--Descrition--}}
            <div class="form-group">
                {{Form::label('description','ลายละเอียด')}}
                {{Form::textarea('description',null,['id'=>'editor1','value'=>old('description')])}}
               <div class="text-danger"> {{$errors->first('description')}}</div>
            </div>

            {{--Submit--}}
            <div class="form-group">
                {{Form::submit('บันทึก',['class'=>'btn btn-info'])}}
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script>

        CKEDITOR.replace('editor1',{
            language: 'th'

        });

    </script>
    @endsection