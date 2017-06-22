<div class="col-xs-12 m-module-content">
    <div class="m-module-title">
        <h2>{{$activity->title}}
        </h2>
        <div class="line"></div>

    </div>
    <div class="m-module-body">
        <div class="col-xs-12">
            <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:700px;margin:0px auto 115px;">
                <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                    <ul class="amazingslider-slides" style="display:none;">

                        <?php
                        foreach(glob($activity->gallery.'/*.{jpg,png}',GLOB_BRACE) as $image)
                        {?>
                        <li><img src="{{asset($image)}}"></li>
                        <?php
                        }
                        ?>
                    </ul>
                    <ul class="amazingslider-thumbnails" style="display:none;">
                        <?php
                        foreach(glob($activity->thumb_gallery.'/*.{jpg,png}',GLOB_BRACE) as $thumb_image)
                        {?>
                        <li><img src="{{asset($thumb_image)}}"></li>
                            <div class="clearfix"></div>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xs-12 activity-show">
            {!! $activity->text !!}
            <br>
            {{--{!! $activity->gallery !!}--}}
        </div>
    </div>
</div>

