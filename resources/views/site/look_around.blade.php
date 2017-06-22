@extends('site.layouts.master_left_sidebar')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
            {{--Map--}}
            <div id="dvMap" style="width:100%; height:500px;"></div>
        </div>
    </div>
@endsection
@section('side_menu_top')
    {{--@include('site.layouts.icon_details')--}}
@endsection
@section('script')
    <script>
        var buildings = '{!!$buildingMarkers!!}';
//            var buildings = '[{"hlong":"hlong2"},{"test":"test"}]';
          buildings=JSON.parse(buildings);
//          console.log(buildings);
        showAllBuildingMarker(buildings);
    </script>
@endsection