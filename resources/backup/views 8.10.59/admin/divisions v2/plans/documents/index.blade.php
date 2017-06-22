@extends('admin.layouts.admin_master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการเอกสาร ฝ่ายแผนงานและความร่วมมือ</div>
        <div class="panel-body">
            <div class="col-xs-12 col-md-4">
                <a href={{route('admin.divisions.plans.documents.create')}} class="btn btn-default">เพิ่มเอกสาร</a>
            </div>
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อเอกสาร</th>
                        <th>หมวดหมู่</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $row =1;?>
                    @foreach($documents as $document)
                        <tr>
                            <td class="hidden document-id">{{$document->id}}</td>
                            <td>{{$row}}</td>
                            <td>
                                <a href={{$document->file_path}}>{{$document->title}}</a>
                            </td>
                            <td>
                                {{$document->category->title}}
                            </td>
                            <td>
                                <a class="btn btn-danger delete-document">ลบ</a>
                            </td>
                        </tr>
                        <?php $row++ ?>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

{{--Script--}}
@section('page-script')
    <script>
        $(document).ready(function() {

            $(".delete-document").click(function(){
                var document_row=$(this).parent("td").parent("tr");
                var btn_confirm=confirm("ต้องการที่จะลบ");
                var document_id=$(this).parent("td").siblings(".document-id").text();//Get document id
//
              
                if(btn_confirm){
                    $.ajax({
                        url:'delete_document',
                        data:{document_id:document_id},
                        type:'GET',
                        success:function(data){
                            if(data)
                                document_row.remove();
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