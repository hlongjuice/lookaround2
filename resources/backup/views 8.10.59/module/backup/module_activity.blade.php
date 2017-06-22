<div class="col-xs-12 m-module-content">
    <div class="m-module-title">
        <h2>กิจกรรมล่าสุด</h2>
        <div class="line"></div>
    </div>
    <div class="m-module-body">
        <?php $i=0 ?>
        @foreach($activities as $activity)
            @if($i%2==0)
                <div class="col-xs-12 col-md-6 left-column">
                    <div class="post">
                        <div class="post-image">
                            {{--Preg_match use for get first image from string--}}
                            <?php preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $activity->text, $img);?>
                            <?php if(Empty($img))
                                    echo '<img scr="">';
                                else
                                    echo "<img src=$img[1]>";
                            ?>

                            {{--{{$img[0]}}--}}
                        </div>
                    <div class="post-detail">
                        <h3 class="post-title"><a>{{$activity->title}}</a></h3>
                        <span class="post-date">{{$activity->updated_at->format('d-m-Y')}}</span>
                        <?php $text=preg_replace('/<img[^>]+\>/i',"", $activity->text);?>
                        {!!$text!!}
                        <div class="read-more">
                            <a>อ่านเพิ่มเติม</a>
                        </div>
                        <div class="sign-up"></div>
                    </div>
                </div>
                </div>
            @else
                <div class="col-xs-12 col-md-6 right-column">
                    <div class="post">
                        <div class="post-detail">
                            <h3 class="post-title"><a>{{$activity->title}}</a></h3>
                            <span class="post-date">{{$activity->updated_at->format('d-m-Y')}}</span>
<!--                            --><?php //preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $activity->text, $img);?>
                            <?php $text=preg_replace('/<img[^>]+\>/i', "", $activity->text);?>
                            {!!$text!!}
                            <div class="read-more">
                                <a>อ่านเพิ่มเติม</a>
                            </div>
                            <div class="sign-down"></div>
                        </div>
                        <div class="post-image">
                            {{--Preg_match use for get first image from string--}}
                            {{--<img src="{{ $img[1] }}" >--}}
                            <?php preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $activity->text, $img);?>
                            <?php if(Empty($img))
                                echo '<img scr="">';
                            else
                                echo "<img src=$img[1]>";
                            ?>

                        </div>
                    </div>
                </div>
                @endif
            <?php $i++?>
        @endforeach
    </div>
</div>