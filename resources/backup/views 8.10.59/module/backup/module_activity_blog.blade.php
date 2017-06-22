<div class="col-xs-12 m-module-content">
    <div class="m-module-title">
        <h2>กิจกรรมล่าสุด
            <span style="font-size:14px "><a href="{{route($activity_path)}}" class="pull-right">ดูกิจกรรมทั้งหมด</a></span></h2>

        <div class="line"></div>

    </div>
    <div class="m-module-body">
        <?php $i=0 ?>
        @foreach($activities as $activity)
            <div class="col-xs-12 col-md-6 activity-blog-post">
                <div class="col-xs-12 activity-blog-image">
                    <?php preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $activity->text, $img);?>
                    <?php
                    if(Empty($img))
                    {
                        $image="";
                        $images=glob($activity->gallery.'/*.{jpg,png,gif}',GLOB_BRACE);
                        if(count($images)>0)
                        {
                            $image=$images[0];
                        }
                    ?>
                            <img src="{{asset($image)}}">

                    <?php }

                    else
                        echo "<img src=$img[1]>";
                    ?>

                </div>
                <div class="col-xs-12 activity-blog-detail">
                    <h3 class="post-title"><a href="{{route($activity_show_path,$activity->id)}}">{{$activity->title}}</a></h3>
                    <span class="post-date">{{$activity->updated_at->format('d-m-Y')}}</span>
                    <!--                            --><?php //preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $activity->text, $img);?>
                    <?php $text=preg_replace('/<img[^>]+\>/i', "", $activity->text);?>
                    {!!$text!!}
                    <div class="read-more">
                        <a href="{{route($activity_show_path,$activity->id)}}">อ่านเพิ่มเติม</a>
                    </div>
                    <div class="sign-down"></div>
                </div>

            </div>
            <?php $i++?>
            @if($i%2==0)
                    <div class="clearfix"></div>
                @endif
        @endforeach
    </div>
</div>