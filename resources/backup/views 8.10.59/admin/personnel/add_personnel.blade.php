@extends('admin.layouts.admin_master')

{{--MAin Content--}}
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>เพิ่มบุคคลากร</h4>
        </div>
        <div class="panel-body">
            {{--Student Form--}}
            {{Form::open(array('route'=>'admin.personnel.store','files'=>true,))}}

            {{--Gender--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('gender','เพศ')}}
                <div class="form-group">
                    <div class="col-xs-6">
                        <label class="radio-inline"><input type="radio" data-validation="required" name="gender" id="gender" value="ชาย">ชาย</label>
                    </div>
                    <div class="col-xs-6">
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="หญิง">หญิง</label>
                    </div>
                </div>
            </div>

            {{--Name--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('name','ชื่อ')}}
                    {{Form::text('name',null,array('data-validation'=>'required','class'=>'form-control','placeholder'=>'ชื่อ'))}}
            </div>

            {{--LastName--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('lastname','นามสกุล')}}
                    {{Form::text('lastname',null,array( 'data-validation'=>'required', 'class'=> 'require form-control','placeholder'=>'นามสกุล'))}}
            </div>
            <div class="clearfix"></div>

            {{--Graduation--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('graduation[]','วุฒิ')}}
                {{Form::text('graduation[]',null,array( 'data-validation'=>'required', 'class'=> 'require form-control','placeholder'=>'วุฒิการศึกษา'))}}
            </div>

            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('graduation[]','วุฒิ2')}}
                {{Form::text('graduation[]',null,array( 'data-validation'=>'required', 'class'=> 'require form-control','placeholder'=>'วุฒิการศึกษา'))}}
            </div>

            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('graduation[]','วุฒิ3')}}
                {{Form::text('graduation[]',null,array( 'data-validation'=>'required', 'class'=> 'require form-control','placeholder'=>'วุฒิการศึกษา'))}}
            </div>
            <div class="clearfix"></div>

            {{--Rank--}}
            <div class="col-xs-6 col-md-4 form-group">
                {{Form::label('rank','ตำแหน่ง')}}
                {{Form::select('rank',$ranks,null,['class'=>'form-control'])}}
            </div>

            {{--Department--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('department','แผนก')}}
                {{Form::select('department',$departments,null,array('data-validation'=>'required','class'=>'form-control'))}}
            </div>

            {{--Image--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('image','รูป')}}
                {{Form::file('image')}}
            </div>
            <div class="clearfix"></div>

            {{--Duty And Division--}}
            <div class="col-xs-12 duty_division_wrap">
                <div class="duty_division_group">
                    {{--Duty--}}
                    <div class="col-xs-12 col-md-4 form-group">
                        {{Form::label('duty','หน้าที่รับผิดชอบ')}}
                        <div class="form-group">
                            <div class="col-xs-6 col-md-6">
                                <label class="radio-inline"><input data-validation="required" type="radio" name="duty0" id="duty" value="1">หัวหน้า</label>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <label class="radio-inline"><input type="radio" name="duty0" id="duty" value="2">เจ้าหน้าที่</label>
                            </div>
                        </div>
                    </div>

                    {{--Division--}}
                    <div class="col-xs-12 col-md-4 form-group">
                        {{Form::label('division',' ฝ่าย')}}
                        {{Form::select('division[]',$divisions,null,array('data-validation'=>'required','class'=>'form-control'))}}
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 form-group">
                    <div class="col-xs-6">
                        <label>เพิ่ม</label>
                        <div class="clearfix"></div>
                        <a class="btn btn-default add_field_button" >+</a>
                    </div>
                    <div class="col-xs-6">
                    <label>ลบ</label>
                    <div class="clearfix"></div>
                    <a class="btn btn-danger remove_field" >-</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>



            {{--End Duty And Division--}}

            <div class="clearfix"></div>
            {{--Submit--}}
            <div class="col-xs-12 col-md-4 form-group">
              {{Form::submit('บันทึก',array('class'=>'btn-submit btn btn-success btn-block'))}}
            </div>


            {{Form::close()}}
        </div>
    </div>
@endsection

@section('page-script')
    {{--Dynamic Duty and Division Fields--}}
    <script>

        $(document).ready(function() {
            var max_fields = 20; //maximum input boxes allowed
            var wrapper = $(".duty_division_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID
            var x = 1; //initlal text box count


            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed

                    $(wrapper).append('' +
                            '<div class="duty_division_group">' +
                            '<div class="col-xs-12 col-md-4 form-group">'+
                            '<label>หน้าที่รับผิดชอบ</label>'+
                            '<div class="form-group">'+
                            '<div class="col-xs-6 col-md-6">'+
                            '<label class="radio-inline"><input data-validation="required" type="radio" name="duty'+x+'" id="duty" value="1">หัวหน้า</label>'+
                            '</div>'+
                            '<div class="col-xs-6 col-md-6">'+
                            '<label class="radio-inline"><input type="radio" name="duty'+x+'" id="duty" value="2">เจ้าหน้าที่</label>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="col-xs-12 col-md-4 form-group">'+
                            '<label>ฝ่าย</label>'+
                            '<select data-validation="required" name="division[]"  class="sl-divisions'+x+' form-control">'+
                            '<option value="">กรุณาเลือก</option>'+
                            '</select>'+
                            '</div>'+
                            '<div class="col-xs-12 col-md-4 form-group">'+
                            '<label>ลบ</label>'+
                            '<div class="clearfix"></div>'+
                            '<a class="btn btn-danger remove_field" >-</a>'+
                            '</div>'+
                            '</div>'+
                            '<div class=clearfix></div>');
                    /*Use Ajax to get all divisions*/
                    $.ajax({
                        url: '../divisions',
                        type: "GET",
                        dataType: 'json',
                        success: function (data) {
                            var sl_count=".sl-divisions"+(x-1);
                            $.each(data,function(key,division){
//
                                if(division.id >1)
                                    $(sl_count).append('<option value='+division.id+'>'+division.title+'</option>');
//
                            });
                        }
                    });
                    x++; //text box increment
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
            })
        });
            /*

        */
        /*
         $(wrapper).append('' +
         '<div class="duty_division_group">' +
         '<div class="col-xs-12 col-md-4 form-group">'+
         '<label>หน้าที่รับผิดชอบ</label>'+
         '<div class="form-group">'+
         '<div class="col-xs-6 col-md-6">'+
         '<label class="radio-inline"><input data-validation="required" type="radio" name="duty'+x+'" id="duty" value="1">หัวหน้า</label>'+
         '</div>'+
         '<div class="col-xs-6 col-md-6">'+
         '<label class="radio-inline"><input type="radio" name="duty'+x+'" id="duty" value="2">เจ้าหน้าที่</label>'+
         '</div>'+
         '</div>'+
         '</div>'+
         '<div class="col-xs-12 col-md-4 form-group">'+
         '<label>ฝ่าย</label>'+
         '<select data-validation="required" name="division[]"  class="sl-divisions'+x+' form-control">'+
         '<option value="">กรุณาเลือก</option>'+
         '</select>'+
         '</div>'+
         '<div class="col-xs-12 col-md-4 form-group">'+
         '<label>ลบ</label>'+
         '<div class="clearfix"></div>'+
         '<a class="btn btn-danger remove_field" >-</a>'+
         '</div>'+
         '</div>'+
         '<div class=clearfix></div>');

         /*Use Ajax to get all divisions*/
//        $.ajax({
//            url: '../divisions',
//            type: "GET",
//            dataType: 'json',
//            success: function (data) {
//                var sl_count=".sl-divisions"+(x-1);
//                $.each(data,function(key,division){
//                    if(division.id >1)
//                        $(sl_count).append('<option value='+division.id+'>'+division.title+'</option>');
//                });
//            }
//        });
//        x++; //text box increment*/

    </script>
    @endsection
