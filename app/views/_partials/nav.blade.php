<header class="navbar et-navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::route('home')}}"><i class="fa fa-graduation-cap"></i> <strong>edu</strong>talk</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{URL::route('home')}}" class="nav-link">Startseite</a></li>
                @if (Auth::check())
                    <li><a href="{{URL::route('groups.index')}}" class="nav-link">Gruppen</a></li>
                @endif
                <li><a href="{{URL::route('about')}}" class="nav-link">Was ist Edutalk?</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                <li class="header-search">
                    {{ Form::open(array('url' => 'search', 'class' => 'navbar-form')) }}
                        <input type="text" name="search" placeholder="Suchen..."/>
                    {{ Form::close() }}
                </li>
                @endif
                @if (Auth::check())
                    <li class="dropdown header-profile">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                            <img src="{{asset('img/et-user.jpg')}}" width="40" alt=""/> {{$currentUser->username}}
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation" class="dropdown-header">{{$currentUser->username}}</li>

                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::route('users.show', Auth::user()->username)}}">Mein Profil</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::route('user.edit', Auth::user()->username)}}">Profil bearbeiten</a></li>

                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::to('/logout')}}">Abmelden <i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    </li>
                @else
                <li class=""><a href="{{ URL::route('login') }}" class="btn btn-primary btn-login">Anmelden <i class="fa fa-sign-in"></i></a></li>
                <li class=""><a href="{{ URL::route('register') }}" class="nav-link">Registrieren <i class="fa fa-lock"></i></a></li>
                @endif


            </ul>
        </div><!--/.nav-collapse -->
    </div>
</header>
