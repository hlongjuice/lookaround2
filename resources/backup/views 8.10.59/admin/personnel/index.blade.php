@extends('admin.layouts.admin_master')

@section('content')
    <div class="panel panel-default">
         <div class="panel-heading"><h4>บุคคลากร</h4></div>
        <div class="panel-body">
            <div class="row" id="add-personnel-btn">
                <div class="col-xs-6 col-md-4">
                    <a class="btn btn-default" href={{route('admin.personnel.create')}}>เพิ่มบุคคลากร</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ตำหแหน่ง</th>
                        <th>แผนก</th>
                        <th>งานที่รับผิดชอบ</th>
                        <th>รูป</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>


                {{--Show All Personnel--}}
                    @foreach($personnel as $person)

                    <tr>
                        <td class="hidden person-id">{{$person->id}}</td>
                        <td>{{$person->name}}</td>
                        <td>{{$person->lastname}}</td>
                        <td>{{$person->rank->title}}</td>
                        <td>{{$person->department->title}}</td>

                        <td class="ddp-td">
                            {{--Show all personnel's duty--}}
                            @foreach($person->duties as $duty)
                                <p class="hidden ddp-id">{{$duty->pivot->ddp_id}}</p>
                                {{$duty->title}}
                                {{$duty->pivot->division_title}}
                                <br>
                            @endforeach
                        </td>
                        <td>
                            {{--Check Image--}}
                            @if(!empty($person->image))
                                <a href="#"><img src="{{url($person->image)}}" style="width: 60px;"></a>
                            @else
                                <img class="img-responsive " style="width: 60px;" src="http://placehold.it/60x60">
                            @endif
                        </td>
                        <td>
                            <a href={{route('admin.personnel.edit',['id'=>$person->id])}} class="btn btn-default">แก้ไข</a>
                        </td>
                        <td>
                            <a class="btn btn-danger delete-personnel">ลบ</a>
                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection


{{--Script--}}
@section('page-script')
    <script>
        $(document).ready(function() {

            $(".delete-personnel").click(function(){
                var personnel_row=$(this).parent("td").parent("tr");
                var ddp_ids=[];
                var btn_confirm=confirm("ต้องการที่จะลบ");
                var person_id=$(this).parent("td").siblings(".person-id").text();//Get person id
                var ddp_td= $.trim($(this).parent("td").siblings(".ddp-td").text());
                if(ddp_td!=""){     //Check ddp_id value
                    $(this).parent("td").siblings("td").children(".ddp-id").each(function(){ //Get ddp_id
                        ddp_ids.push($(this).text()); //Add ddp_id to array
                    });
                }
                else{
                    ddp_ids="";
                }
                if(btn_confirm){
//                    $.ajax({
//                        url:'personnel_delete=',
//                        data:{person_id:person_id,ddp_ids:ddp_ids},
//                        type:'POST',
//                        success:function(data){
//                            personel_row.remove();
//                        }
//                    });
                    $.ajax({
                        url:"personnel/"+person_id,
                        type:"POST",
                        data: {_method:'delete', _token :"{{csrf_token() }}"},
                        success:function(result){
//                            alert(result);
                            personnel_row.remove();
                        }
                    });
                }

            });
            $('#select_all').click(function(event) {  //on click
                if(this.checked) { // check select status
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"
                    });
                }else{
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"
                    });
                }
            });

        });
    </script>
@endsection