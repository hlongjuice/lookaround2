@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการข้อความวิ่งประชาสัมพันธ์</div>
        <div class="panel-body">
            {{Form::open([
            'route'=>['admin.news_ticker.update',$news_ticker->category_id],
            'method'=>"PATCH",
            'files'=>true
            ])}}

            {{--Title--}}
            <div class="form-group">
                {{Form::label('title','หัวเรื่อง')}}
                {{Form::text('title',$news_ticker->title,['class'=>'form-control','value'=>old('title')])}}
                <div class="text-danger">{{$errors->first('title')}}</div>
            </div>

            {{--Descrition--}}
            <div class="form-group">
                {{Form::label('text','ลายละเอียด')}}
                {{Form::textarea('text',$news_ticker->text,['id'=>'editor1','value'=>old('text')])}}
                <div class="text-danger"> {{$errors->first('text')}}</div>
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