
{{--Duty And Division--}}
    <div class="duty_division_group">
        {{--Duty--}}
        <div class="col-xs-12 col-md-4 form-group">
            {{Form::label('duty','หน้าที่รับชอบ')}}
            <div class="form-group">
                <div class="col-xs-6 col-md-6">
                    <label class="radio-inline"><input type="radio" name="duty" id="duty" value="1">หัวหน้า</label>
                </div>
                <div class="col-xs-6 col-md-6">
                    <label class="radio-inline"><input type="radio" name="duty" id="duty" value="2">เจ้าหน้าที่</label>
                </div>
            </div>
        </div>

        {{--Division--}}
        <div class="col-xs-12 col-md-4 form-group">
            {{Form::label('division',' ฝ่าย')}}
            {{Form::select('division',$divisions,null,array('class'=>'form-control'))}}
        </div>
        <div class="col-xs-12 col-md-4 form-group">
            <label>ลบ</label>
            <div class="clearfix"></div>
            <a class="btn btn-danger remove_field" >-</a>
        </div>
    </div>
{{--End Duty And Division--}}
