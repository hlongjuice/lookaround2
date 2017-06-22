<div class="s-module-menu">
    <div class="s-module-title">
        <h2>งานต่างๆภายในฝ่าย</h2>
    </div>
    <div class="s-module-body">
        <ul class="list-unstyled ">
            @foreach($duties as $duty)
                <li><a href={{route('documents.index',$duty->id)}}>{{$duty->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>