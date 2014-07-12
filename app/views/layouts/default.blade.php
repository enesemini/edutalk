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
    @include('_partials.nav')

    @include('_partials.notifications')

    @yield('content')

    @include('_partials.footer')
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/holder.js"></script>
    <script src="js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>