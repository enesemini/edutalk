<header class="navbar et-navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-graduation-cap"></i> <strong>edu</strong>talk</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#" class="nav-link">Startseiten</a></li>
                <li><a href="#" class="nav-link">Gruppen</a></li>
                <li><a href="#" class="nav-link">Nachrichten</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="header-search">
                    <form class="navbar-form" action="">
                        <input type="text" placeholder="Suchen..."/>
                    </form>
                </li>
                @if (Auth::check())
                    <li class="dropdown header-profile">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                            <img src="js/holder.js/40x40" alt=""/> {{$currentUser->username}}
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation" class="dropdown-header">{{$currentUser->username}}</li>

                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::route('users.show', Auth::user()->username)}}">Mein Profil</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::route('users.edit', Auth::user()->username)}}">Profil bearbeiten</a></li>

                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::to('/logout')}}">Abmelden <i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    </li>
                @else
                <li class=""><a href="{{ URL::route('login') }}" class="nav-link">Anmelden <i class="fa fa-sign-in"></i></a></li>
                <li class=""><a href="{{ URL::route('register') }}" class="nav-link">Registrieren <i class="fa fa-lock"></i></a></li>
                @endif


            </ul>
        </div><!--/.nav-collapse -->
    </div>
</header>
