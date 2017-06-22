@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการบทความ</div>
        <div class="panel-body">
            <div class="col-md-4">
                <a href={{route('admin.image_slider.create')}}>เพิ่มสไลด์รูปภาพ</a>
            </div>
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการ</th>
                        <th>วันที่</th>
                        <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
                        <th><i class="fa fa-trash" aria-hidden="true"></i></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $row=1?>
                    @foreach($images as $image)
                        <tr>
                            <td>{{$row}}</td>
                            <td class="hidden image-id">{{$image->id}}</td>
                            <td><a href={{route('admin.images.edit',$content->id)}}>{{$image->title}}</a></td>
                            <td>{{$content->created_at}}</td>
                            <td><a href="{{route('admin.contents.edit',$image->id)}}" class="btn btn-info ">แก้ไข</a></td>
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
                var image_id=$(this).parent("td").siblings(".image-id").text();//Get person id

                if(btn_confirm){
//                    alert(content_id);
                    $.ajax({
                        url:"images/"+image_id,
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
