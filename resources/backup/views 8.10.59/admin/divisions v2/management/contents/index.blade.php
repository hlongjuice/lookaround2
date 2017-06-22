@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการบทความ</div>
        <div class="panel-body">
            <div class="col-md-4">
                <a href={{route('admin.divisions.management.contents.create')}}>เพิ่มบทความ</a>
            </div>
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการ</th>
                        <th>หมวดหมู่</th>
                        <th>วันที่</th>
                        <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
                        <th><i class="fa fa-trash" aria-hidden="true"></i></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $row=1?>
                    @foreach($contents as $content)
                        <tr>
                            <td>{{$row}}</td>
                            <td class="hidden content-id">{{$content->id}}</td>
                            <td><a href={{route('admin.divisions.management.contents.edit',$content->id)}}>{{$content->title}}</a></td>
                            <td>{{$content->category->title}}</td>
                            {{--<td>{{$content->created_at}}</td>--}}
                            <td>{{date('d-m-Y', strtotime($content->category->created_at))}}</td>
                            <td><a href="{{route('admin.divisions.management.contents.edit',$content->id)}}" class="btn btn-info ">แก้ไข</a></td>
                            <td><a class="btn btn-danger delete-content">ลบ</a></td>
                        </tr>
                        <?php $row++ ?>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $(".delete-content").click(function(){
                var content_row=$(this).parent("td").parent("tr");
                var btn_confirm=confirm("ต้องการที่จะลบ");
                var content_id=$(this).parent("td").siblings(".content-id").text();//Get person id

                if(btn_confirm){
                    $.ajax({
                        url:"contents/"+content_id,
                        type:"DELETE",
                        data: { "_token": "{{ csrf_token() }}" },
                        success:function(result){
                            content_row.remove();
                        }
                    });
                }

            });
        });
    </script>
@endsection
