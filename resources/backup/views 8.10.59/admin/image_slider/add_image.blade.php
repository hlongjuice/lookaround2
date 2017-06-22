@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel panel-heading">
            ระบบจัดการสไลท์รูปภาพ
        </div>
        {{Form::open([
        'route'=>['admin.image_slider.update','all'],
        'method'=>'PATCH',
        ])}}
        <div class="panel-body">
            {{--Pic 1--}}
            <div class="col-xs-12 image-slider-group">
                <div class="col-xs-2">
                    <div>รูปที่ 1</div>
                </div>
                <div class="col-xs-10">
                    <div class="form-group">
                        {{Form::label('title','ชื่อรูป')}}
                        <div class="col-xs-8">
                            {{Form::text('title[]',$images[0]->title,['class'=>'form-control'])}}
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="image[]" class="form-control image" type="text"
                                   value={{$images[0]->image}} />
                        </div>
                        <a class="btn btn-default btn-image">เลือกรูปภาพ</a>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            {{Form::label('description','ข้อความ')}}
                            {{Form::textarea('description[]',$images[0]->description,['class'=>'form-control', 'rows'=>'5'])}}
                        </div>

                    </div>
            </div>
            </div>

            <div class="clearfix"></div>
            {{--Pic 2--}}
            <div class="col-xs-12 image-slider-group">
                <div class="col-xs-2">
                    <div>รูปที่ 2</div>
                </div>
                <div class="col-xs-10">
                    <div class="form-group">
                        {{Form::label('title','ชื่อรูป')}}
                        <div class="col-xs-8">
                            {{Form::text('title[]',$images[1]->title,['class'=>'form-control'])}}
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="image[]"  class="form-control image" type="text"
                                   value={{$images[1]->image}} />
                        </div>
                        <a class="btn btn-default btn-image">เลือกรูปภาพ</a>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            {{Form::label('description','ข้อความ')}}
                            {{Form::textarea('description[]',$images[1]->description,['class'=>'form-control', 'rows'=>'5'])}}
                        </div>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            {{--Pic 3--}}
            <div class="col-xs-12 image-slider-group">
                <div class="col-xs-2">
                    <div>รูปที่ 3</div>
                </div>
                <div class="col-xs-10">
                    <div class="form-group">
                        {{Form::label('title','ชื่อรูป')}}
                        <div class="col-xs-8">
                            {{Form::text('title[]',$images[2]->title,['class'=>'form-control'])}}
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="image[]"  class="form-control image" type="text"
                                   value={{$images[2]->image}} />
                        </div>
                        <a class="btn btn-default btn-image">เลือกรูปภาพ</a>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            {{Form::label('description','ข้อความ')}}
                            {{Form::textarea('description[]',$images[2]->description,['class'=>'form-control', 'rows'=>'5'])}}
                        </div>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            {{--Pic 4--}}
            <div class="col-xs-12 image-slider-group">
                <div class="col-xs-2">
                    <div>รูปที่ 4</div>
                </div>
                <div class="col-xs-10">
                    <div class="form-group">
                        {{Form::label('title','ชื่อรูป')}}
                        <div class="col-xs-8">
                            {{Form::text('title[]',$images[3]->title,['class'=>'form-control'])}}
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="image[]"  class="form-control image" type="text"
                                   value={{$images[3]->image}} />
                        </div>
                        <a class="btn btn-default btn-image">เลือกรูปภาพ</a>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            {{Form::label('description','ข้อความ')}}
                            {{Form::textarea('description[]',$images[3]->description,['class'=>'form-control', 'rows'=>'5'])}}
                        </div>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            {{--Pic 5--}}
            <div class="col-xs-12 image-slider-group">
                <div class="col-xs-2">
                    <div>รูปที่ 5</div>
                </div>
                <div class="col-xs-10">
                    <div class="form-group">
                        {{Form::label('title','ชื่อรูป')}}
                        <div class="col-xs-8">
                            {{Form::text('title[]',$images[4]->title,['class'=>'form-control'])}}
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="image[]"  class="form-control image" type="text"
                                   value={{$images[4]->image}} />
                        </div>
                        <a class="btn btn-default btn-image">เลือกรูปภาพ</a>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            {{Form::label('description','ข้อความ')}}
                            {{Form::textarea('description[]',$images[4]->description,['class'=>'form-control', 'rows'=>'5'])}}
                        </div>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class='col-xs-12 image-slider-group'>
                <div class="form-group">
                    {{Form::submit('บันทึก',['class'=>'btn btn-success pull-right'])}}
                </div>
            </div>



        </div>

    </div>
@endsection

@section('page-script')
    <script>

        $(document).ready(function(){

            $('.btn-image').click(function(){
                var output=$(this).siblings('div').children('.image');
                openKCFinder(output);
            });
        });

        CKEDITOR.replace('editor1',{
            language: 'th'
        });




        function openKCFinder(output) {
            window.KCFinder = {
                callBack: function(url) {
                    url = decodeURIComponent(url);
                    output.val(url);
                    window.KCFinder = null;
                }
            };
            window.open('../../js/kcfinder/browse.php?type=images&dir=images/public', 'kcfinder_textbox',
                    'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                    'resizable=1, scrollbars=0, width=800, height=600'
            );
        }

    </script>
@endsection