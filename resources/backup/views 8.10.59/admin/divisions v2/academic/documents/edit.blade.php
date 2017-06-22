@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการเอกสาร ฝ่ายวิชาการ</div>
        <div class="panel-body">
            {{Form::open([
            'route'=>['admin.documents.update','academic','9',$document->id],
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

            <div class="col-xs-12 form-group">
                {{Form::label('file','ไฟล์')}}
                <input name="file" type="text" readonly="readonly" onclick="openKCFinder(this)"
                       value="{{$document->file_path}}"width:600px;cursor:pointer" />
                {{--{{Form::file('file')}}--}}

                <div class="text-danger">{{$errors->first('file')}}</div>
            </div>


            <div class="col-xs-12 col-md-6 for form-group">
                {{Form::submit('อัพโหลด',['class'=>'btn btn-success btn-block'])}}
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        function openKCFinder(field) {
            window.KCFinder = {
                callBack: function(url) {

                    field.value = url;
                    window.KCFinder = null;
                }
            };
            window.open('{{ asset('js/kcfinder/browse.php?type=files') }}', 'kcfinder_textbox',
                    'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                    'resizable=1, scrollbars=0, width=800, height=600'
            );
//            window.KCFinder=null;
        }
    </script>

@endsection