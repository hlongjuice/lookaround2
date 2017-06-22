@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการกิจกรรม {{$division->title}}</div>
        <div class="panel-body">
            {{Form::open([
            'route'=>['admin.activities.update',$division->id,$activity_id,$content->id],
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

            <div class="col-xs-12 col-md-6 form-group">
                {{Form::label('file','แกลเลอรีรูปภาพ')}}
                <div class="input-group">
                    <input id="gallery" class="file form-control" name="gallery" type="text" readonly="readonly" onclick="openKCFinder(this)"
                           value="{{$content->gallery}}" style="cursor:pointer" />
                    <span class="input-group-addon">
                      <label onclick="openKCFinder(this)">เลือกไฟล์</label>  {{--<input class="btn btn-default" onclick="openKCFinder(this)" type="button" value="เลือกไฟล์">--}}
                    </span>
                </div>
                <div class="text-danger">{{$errors->first('gallery')}}</div>
            </div>
            <div class="clearfix"></div>

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
                    document.getElementById("gallery").value=decodeURIComponent(url);

//                    field.value =decodeURIComponent(url);
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