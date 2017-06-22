@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">ผู้ดูแลระบบ</h3></div>
        <div class="panel-body">
            <div class="row" id="add-personnel-btn">
                <div class="col-xs-6 col-md-4">
                    <a class="btn btn-default" href={{route('admin.users.create')}}>เพิ่มผู้ดูแลระบบ</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>รูป</th>
                    <th>email</th>
                    <th>กลุ่ม</th>
                    <th>รีเซ็ทรหัสผ่าน</th>
                </tr>
                </thead>
                <tbody>

                {{--Show All Personnel--}}
                @foreach($users as $user)

                    <tr>
                        <td class="hidden person-id">{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->image}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <table>
                                @foreach($user->usergroups as $usergroup)
                                <tr>
                                        <td>{{$usergroup->title}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </td>


                        <td>
                            <a href={{route('admin.users.edit',['id'=>$user->id])}} class="btn btn-default">แก้ไข</a>
                        </td>
                        <td>
                            <a class="btn btn-danger delete-user">ลบ</a>
                        </td>
                        <td>
                            <a href="{{route('admin.password.edit',$user->id)}}" class="btn btn-danger">รีเซ็ทรหัสผ่าน</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $(".delete-user").click(function(){
                var user_row=$(this).parent("td").parent("tr");
                var btn_confirm=confirm("ต้องการที่จะลบ");
                var user_id=$(this).parent("td").siblings(".person-id").text();//Get person id

                if(btn_confirm){
//                    alert(content_id);
                    $.ajax({
                        url:"users/"+user_id,
                        type:"POST",
                        data: {_method:'delete', _token :"{{csrf_token() }}"},
                        {{--data: {_method: 'DELETE,_token:"{{ csrf_token() }}"' },--}}
                        success:function(result){
                            user_row.remove();
                        }
                    });
                }

            });
        });
    </script>
@endsection