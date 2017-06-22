@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            หมวดหมู่
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-md-4">
                <a class="btn btn-default" href={{route('admin.categories.create')}}>เพิ่มหมวดหมู่</a>
            </div>
            <div class="col-xs-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ไอดี</th>
                            <th>หมวดหมู่</th>
                            <th>แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $row =1?>
                    @foreach($categories as $category)
                            <tr>
                                <td>{{$row}}</td>
                                <td>{{$category->id}}</td>
                                <td class="hidden category-id">{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td><a href={{route('admin.categories.edit',['id'=>$category->id])}} class="btn btn-info">แก้ไข</a></td>
                                <td></td>
                            </tr>
                            <?php $row++?>
                            @if($category->child)
                                @foreach($category->child as $child)
                                    <tr>
                                        <td>{{$row}}</td>
                                        <td>{{$child->id}}</td>
                                        <td class="hidden category-id">{{$child->id}}</td>
                                        <td>- - {{$child->title}}</td>
                                        <td><a href={{route('admin.categories.edit',['id'=>$child->id])}} class="btn btn-info">แก้ไข</a></td>
                                        <td><a class="btn btn-danger delete-content">ลบ</a></td>
                                    </tr>
                                    <?php $row++ ?>
                                @endforeach
                            @endif
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
                var categoty_id=$(this).parent("td").siblings(".category-id").text();//Get person id

                if(btn_confirm){
//                    alert(content_id);
                    $.ajax({
                        url:"categories/"+categoty_id,
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