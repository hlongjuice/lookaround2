@extends('admin.layouts.admin_master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="hidden">{{$personnel->id}}</h1>
            <h3>แก้ไข {{$personnel->name}} {{$personnel->lastname}} </h3>
        </div>
        <div class="panel-body">
            {!! Form::model($personnel,[
            'method'=>'PATCH',
            'route'=>['admin.personnel.update',$personnel->id],
            'files'=>true
            ])!!}

            {{--Image--}}
            <div class="col-md-12">
                <img class="center-block" width="170px" height="200"  src={{url($personnel->image)}}>
            </div>

            {{--Gender--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{--check gender--}}
                <?php $chk_gender1=""; $chk_gender2="";?>
                @if($personnel->gender=="ชาย")
                    <?php $chk_gender1='checked="checked"'?>
                @else
                    <?php $chk_gender2='checked="checked"'?>
                @endif
                {{Form::label('gender','เพศ')}}
                <div class="form-group">
                    <div class="col-xs-6">
                        <label class="radio-inline"><input {{$chk_gender1}} type="radio" data-validation="required" name="gender" id="gender" value="ชาย">ชาย</label>
                    </div>
                    <div class="col-xs-6">
                        <label class="radio-inline"><input {{$chk_gender2}} type="radio" name="gender" id="gender" value="หญิง">หญิง</label>
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

            {{--Rank--}}
            <div class="col-xs-6 col-md-4 form-group">
                {{Form::label('rank','ตำแหน่ง')}}
                {{Form::select('rank',$ranks,$personnel->rank_id,['class'=>'form-control'])}}
            </div>

            {{--Department--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('department','แผนก')}}
                {{Form::select('department',$departments,$personnel->department_id,array('data-validation'=>'required','class'=>'form-control'))}}
            </div>

            {{--Image--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('image','รูป')}}
                {{Form::file('image')}}
            </div>
            <div class="clearfix"></div>

            {{--Duty And Division--}}
            <div class="duty_division_wrap">
                <?php $i=0; ?>
                @foreach($personnel->duties as $p_duty)
                    <?php $chk_duty1=""; $chk_duty2=""?>

                {{--Row duty_division_group--}}
                <div class="duty_division_group">
                    {{--Division Duty Personnel ID that hidden--}}
                    {{Form::text('ddp_id[]',$p_duty->pivot->ddp_id,['class'=>'hidden ddp_id'])}}
                    {{--Duty--}}
                    <div class="col-xs-12 col-md-4 form-group">
                        @if($p_duty->id==1)
                            <?php $chk_duty1='checked="checked"';?>
                        @elseif($p_duty->id==2)
                            <?php $chk_duty2='checked="checked"';?>
                        @endif
                        {{Form::label('duty','หน้าที่รับผิดชอบ')}}
                        <div class="form-group">
                            <div class="col-xs-6 col-md-6">
                                <label class="radio-inline"><input {{$chk_duty1}} data-validation="required" type="radio" name="duty{{$i}}" id="duty" value="1">หัวหน้า</label>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <label class="radio-inline"><input {{$chk_duty2}} type="radio" name="duty{{$i}}" id="duty" value="2">เจ้าหน้าที่</label>
                            </div>
                        </div>

                    </div>

                    {{--Division--}}
                    <div>{{$p_duty->pivot->id}}</div>
                    <div class="col-xs-12 col-md-4 form-group">
                        {{Form::label('division',' ฝ่าย')}}
                        {{Form::select('division[]',$divisions,$p_duty->pivot->division_id,array('data-validation'=>'required','class'=>'form-control sl-division'))}}
                    </div>
                    <div class="col-xs-12 col-md-4 form-group ">
                        <label>ลบ</label>
                        <div class="clearfix"></div>
                        <a class="btn btn-danger delete_button" >-</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                    <?php $i++ ?>
                    @endforeach
                {{--End duty_division_group--}}
            </div>
            {{--End Duty And Division--}}
            <div class="col-xs-12 form-group">
                <label>เพิ่มหน้าที่รับผิดชอบ</label>
                <div>
                    <a class="add_field_button btn btn-default">+</a>
                </div>
            </div>
            <div class="duty_division_wrap2">

            </div>

            {{--Submit--}}
            <div class="col-xs-12 col-md-4 ">
                {{Form::submit('อัพเดท',['class'=>'btn btn-success btn-block'])}}
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    @endsection

{{--Script--}}
@section('page-script')
    {{--Dynamic Duty and Division Fields--}}
    <script>
        /*Setup Form Validate*/

        var my_language={
            requiredField: 'กรุณากรอกข้อมูล'
        };
        $.validate({
                    language:my_language
                }

        );
        /***************/

        $(document).ready(function() {
            var max_fields = 20; //maximum input boxes allowed
            var wrapper2 = $(".duty_division_wrap2"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID
            var remove_old_division = ".delete_button";
            var x = 1; //initlal text box count

            /*Remove Current Division*/
            $(remove_old_division).click(function(){
                var btn_confirm=confirm("ต้องการที่จะลบ");
                var parent_div=$(this).parent("div").parent("div");
//                var personnel_id=$("h1.hidden").text();
                var ddp_id=$(this).parent("div").siblings(".ddp_id").val();
//                var duty =$(this).parent("div").siblings("div").find("label > input:checked").val(); //get duty id
                var division = $(this).parent("div").siblings("div").children(".sl-division").val(); //get division id
                if(btn_confirm)
                {
                    $.ajax({
                        url:'../../personnel_delete_division',
                        data:{ddp_id:ddp_id},
                        type:"GET",
                        success:function(data){
                            if(data)
                            parent_div.remove();
                        }
                    });
                }
            });

            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed

                    $(wrapper2).append('' +
                            '<div class="duty_division_group">' +
                            '<div class="col-xs-12 col-md-4 form-group">'+
                            '<label>หน้าที่รับผิดชอบ</label>'+
                            '<div class="form-group">'+
                            '<div class="col-xs-6 col-md-6">'+
                            '<label class="radio-inline"><input data-validation="required" type="radio" name="new_duty'+x+'" id="duty" value="1">หัวหน้า</label>'+
                            '</div>'+
                            '<div class="col-xs-6 col-md-6">'+
                            '<label class="radio-inline"><input type="radio" name="new_duty'+x+'" id="duty" value="2">เจ้าหน้าที่</label>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="col-xs-12 col-md-4 form-group">'+
                            '<label>ฝ่าย</label>'+
                            '<select data-validation="required" name="new_division[]"  class="sl-divisions'+x+' form-control">'+
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
                        url: '../../divisions',
                        type: "GET",
                        dataType: 'json',
                        success: function (data) {
                            var sl_count=".sl-divisions"+(x-1);
                            $.each(data,function(key,division){
                                if(division.id >1)
                                    $(sl_count).append('<option value='+division.id+'>'+division.title+'</option>');
                            });
                        }
                    });
                    x++; //text box increment
                }
            });

            $(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
            })
        });
        /*

         */

    </script>
@endsection