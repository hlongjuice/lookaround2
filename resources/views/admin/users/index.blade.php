@extends('admin.layouts.master_left_sidebar')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                รายชื่อสมาชิก
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>ลำดับ</th>
                        <th>username</th>
                        <th>ชื่อ</th>
                        <th>ประเภท</th>
                        <th>รูป</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                    <?php $row_number=($members->currentPage()*$members->perPage())-($members->perPage()-1)?>
                    @foreach($members as $member)
                    <tr>
                        <td>{{$row_number}}</td>
                        <td>{{$member->username}}</td>
                        <td>{{$member->name}}</td>
                        <td>{{$member->memberType->type}}</td>
                        <td><img width="50px;" height="50px;" src="{{asset($member->image)}}"></td>
                        <td><a href="{{route('admin.members.edit',$member->id)}}" class="btn btn-info">แก้ไข</a></td>
                        <td><form onsubmit="return confirm('ต้องการจะลบสมาชิก ?')" method="post" action="{{route('admin.members.destroy',$member->id)}}">
                                {{csrf_field()}}
                                <input name="_method" value="DELETE" type="hidden">
                                <button type="submit" class="btn btn-danger">ลบ</button>
                            </form>
                        </td>
                    </tr>
                        <?php $row_number++?>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
    @endsection