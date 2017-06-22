@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการกิจกรรม</div>
        <div class="panel-body">
            {{Form::open([
            'route'=>['admin.activities.update','academic',67,$content->id],
            'method'=>"PATCH",
            'files'=>true
            ])}}

            {{--Title--}}
            <div class="form-group">
                {{Form::label('title','หัวเรื่อง')}}
                {{Form::text('title',$content->title,['class'=>'form-control','value'=>old('title')])}}
                <div class="text-danger">{{$errors->first('title')}}</div>
            </div>

            {{--Descrition--}}
            <div class="form-group">
                {{Form::label('description','ลายละเอียด')}}
                {{Form::textarea('description',$content->text,['id'=>'editor1','value'=>old('description')])}}
                <div class="text-danger"> {{$errors->first('description')}}</div>
            </div>

            <div class="form-group">
                {{Form::label('gallery','แกลเลอรี่รูปภาพ')}}
                {{--{{Form::text('gallery',null,['class'=>'col-xs-8 form-control','value'=>old('gallery')])}}--}}
                <input class="form-control" name="gallery" type="text" readonly="readonly" onclick="openKCFinder(this)"
                       value="{{$content->gallery}}" style="width:600px;cursor:pointer" />

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

        function openKCFinder(field) {
            window.KCFinder = {
                callBack: function(url) {

                    field.value =decodeURIComponent(url);
//                    field.value = 'Yo!!';
                    window.KCFinder = null;
                }
            };
            window.open('{{ asset('js/kcfinder/browse.php?type=images') }}', 'kcfinder_textbox',
                    'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                    'resizable=1, scrollbars=0, width=800, height=600'
            );
//            window.KCFinder=null;
        }
    </script>

@endsection