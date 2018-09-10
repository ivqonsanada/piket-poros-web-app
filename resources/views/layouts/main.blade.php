<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="{{ asset('panel/assets/images/favicon.png') }}"/>
        <title>Piket</title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" media="screen" title="no title" charset="utf-8">
    </head>

    <body class="home">
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Loading ..</p>
            </div>
        </div>

        @yield('content')

        <!-- SCRIPTS -->
        <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bundle.js') }}"></script>
    </body>
</html>