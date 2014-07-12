<header class="navbar et-navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><strong>edu</strong>talk</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Startseiten</a></li>
                <li><a href="#about">Gruppen</a></li>
                <li><a href="#contact">Nachrichten</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li class="header-profile"><img src="js/holder.js/40x40" alt=""/></li>
                @else
                <li class="header-login"><a href="{{ URL::route('login') }}">Login <i class="fa fa-sign-in"></i></a></li>
                @endif

                <li class="header-search">
                    <form class="navbar-form" action="">
                        <input type="text" placeholder="Suchen"/>
                    </form></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</header>
