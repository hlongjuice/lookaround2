<div class="col-xs-12 m-module-content">
    <div class="m-module-title">
        <h2>
            ข่าววงการศึกษา
        </h2>
        <div class="line"></div>

    </div>
    <div class="m-module-body">
        <div class="col-xs-12">
            {{--{{$rss->$item->get_items()}}--}}
           {{--{{$rss->get_raw_data()}}--}}
            {{--{{$rss->}}--}}
            @foreach($rss->get_items() as $item)
                <?php
                $enclosure=$item->get_enclosure();

                ?>
                <div class="col-xs-6 col-md-4">
                    <img style="width:100%" src="{{$enclosure->get_link()}}">
                    <h3>{{$item->get_title()}}</h3>
                </div>
            @endforeach

        </div>
    </div>
</div>

