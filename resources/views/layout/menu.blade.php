<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"><a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a
                    class="brand" href="{{route('index')}}">Group Mixer </a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="icon-user"></i> Hola {{Auth::user()->name}} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>{!! link_to_route('logout','Logout') !!}</li>


                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>