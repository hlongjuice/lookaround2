<div class="col-xs-12 m-module-content">
    <div class="m-module-title">
        <h2>เอกสารประชาสัมพันธ์
            <span style="font-size:14px "><a href="{{route($document_path)}}" class="pull-right">ดูเอกสารทั้งหมด</a></span>
        </h2>
        <div class="line"></div>
    </div>
    <div class="m-module-body">
        <div class="col-xs-12 head">
            <div class="col-xs-3">วันที่</div>
            <div class="col-xs-5">รายการ</div>
            <div class="col-xs-4">หมวดหมู่</div>
        </div>

        @foreach($documents as $document)
            <div class="col-xs-12 body">
                <div class="col-xs-3 m-module-line">
                    {{$document->updated_at->format('Y-m-d')}}
                </div>
                <div class="col-xs-5">
                    <a href="{{$document->file_path}}">{{$document->title}}</a>
                </div>
                <div class="col-xs-4">
                    {{$document->category->title}}
                </div>
                <div class=" clearfix col-xs-12">
                    <div class="line-dot"></div>
                </div>
            </div>


        @endforeach

    </div>
</div>