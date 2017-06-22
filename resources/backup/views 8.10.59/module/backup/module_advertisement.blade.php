<div class="col-xs-12 m-module-content">
    <div class="m-module-title">
        <h2>ข่าวประชาสัมพันธ์</h2>
        <div class="line"></div>
    </div>
    <div class="m-module-body">
        <div class="col-xs-12 head">
            <div class="col-xs-3">วันที่</div>
            <div class="col-xs-5">รายการ</div>
            <div class="col-xs-4">หมวดหมู่</div>
        </div>

        @foreach($advertisements as $advertisement)
            <div class="col-xs-12 body">
                <div class="col-xs-3 m-module-line">
                    {{$advertisement->updated_at->format('Y-m-d')}}
                </div>
                <div class="col-xs-5">
                    <a href="{{route('contents.show',['id'=>$advertisement->id])}}">{{$advertisement->title}}</a>
                </div>
                <div class="col-xs-4">
                    {{$advertisement->category->title}}
                </div>
                <div class=" clearfix col-xs-12">
                    <div class="line-dot"></div>
                </div>
            </div>


        @endforeach

    </div>
</div>