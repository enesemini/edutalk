<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edutalk</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div class="navbar et-navbar" role="navigation">
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
                <li class="header-profile"><img src="js/holder.js/40x40" alt=""/></li>
                <li class="header-search">
                    <form class="navbar-form" action="">
                        <input type="text" placeholder="Suchen"/>
                    </form></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
    @yield('content')


    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/holder.js"></script>
    <script src="js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>