<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="row">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-xs-6 navbar-header">
                <a class="navbar-brand" href="{{route('home')}}">Home</a>
            </div>
            <div class="nav-user-icon col-xs-6 col-sm-6 hidden-lg hidden-md" data-toggle="collapse" data-target="#user-menu" aria-expanded="false">
                <div class="pull-right user">
                    @if(Auth::user())
                    <img width="30px" src="{{asset(Auth::user()->image)}}">
                        @endif
                </div>
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="hidden-md hidden-lg">
            <div class="collapse navbar-collapse" id="user-menu">
                @if(Auth::user())
                <ul class="nav navbar-nav">
                    <li><a href="{{route('member.edit',Auth::user()->id)}}" class="">แก้ไขข้อมูลส่วนตัว</a></li>
                    <li><a class="btn btn-danger btn-block" href="{{url('/logout')}}">ออกจากระบบ</a></li>
                </ul>
                    @endif
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container-fluid -->
</nav>