<div class="col-xs-12 m-module-content">
    <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
        @foreach($images as $image)
        <div style="width:100%" data-src="{{ asset($image->image) }}">
            <div class="camera_caption fadeFromBottom">
               {{$image->description}}
            </div>
        </div>
        @endforeach


    </div>
</div>