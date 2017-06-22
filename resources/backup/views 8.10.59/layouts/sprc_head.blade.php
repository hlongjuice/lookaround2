<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8"><h1>วิทยาลัยสารพัดช่างสุราษฎร์ธานี</h1></div>

            <div class="col-md-4">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
{{----}}
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href={{url('admin')}} >Admin</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>