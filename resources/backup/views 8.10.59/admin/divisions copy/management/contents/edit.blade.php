@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการบทความ</div>
        <div class="panel-body">
            {{Form::open([
            'route'=>['admin.divisions.management.contents.update',$content->id],
            'method'=>"PATCH",
            'files'=>true
            ])}}

            {{--Title--}}
            <div class="form-group">
                {{Form::label('title','หัวเรื่อง')}}
                {{Form::text('title',$content->title,['class'=>'form-control','value'=>old('title')])}}
                <div class="text-danger">{{$errors->first('title')}}</div>
            </div>

            {{--Categories--}}
            <div class="form-group">
                {{Form::label('category','หมวดหมู่')}}
                {{Form::select('category',$categories,$content->category_id,['class'=>'form-control'])}}
                <div class="text-danger">{{$errors->first('category')}}</div>
            </div>

            {{--Descrition--}}
            <div class="form-group">
                {{Form::label('text','ลายละเอียด')}}
                {{Form::textarea('text',$content->text,['id'=>'editor1','value'=>old('text')])}}
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
            language: 'th',
            filebrowserBrowseUrl : "{!!asset('js/kcfinder/browse.php?opener=ckeditor&type=files') !!}",
            filebrowserImageBrowseUrl : '{!!asset('js/kcfinder/browse.php?opener=ckeditor&type=images')!!}'

        });
    </script>
@endsection