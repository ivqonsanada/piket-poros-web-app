<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('panel/assets/images/favicon.png') }}">
    <title>Dashboard</title>
    <link href="{{ asset('panel/assets/node_modules/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('panel/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('panel/main/css/style.css') }}">
    <link href="{{ asset('panel/main/css/colors/default.css') }}" id="theme" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Loading ..</p>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                            <img src="{{ asset('panel/assets/images/logo-icon1.png') }}" style="width: 40px" alt="homepage" class="dark-logo" id="logo-1"/>
                            <img src="{{ asset('panel/assets/images/logo-icon2.png') }}" style="width: 40px" alt="homepage" class="dark-logo" id="logo-2" />
                        <span>
                         <img src="{{ asset('panel/assets/images/logo-text.png') }}" style="height: 15px" alt="homepage" class="dark-logo" /> </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                        </li>

                        <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="fa fa-times"></i></a></form>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="/"><span>Home</span> </a>
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"><span>Logout</span> </a>
                        </li>
                    </ul>

                </div>

            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.dashboard') }}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.kuliah') }}" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Jadwal Kuliah</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.daftar') }}" aria-expanded="false"><i class="fa fa-pencil"></i><span class="hide-menu">Daftar Piket</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-check"></i><span class="hide-menu">Hasil</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('panel/assets/node_modules/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('panel/assets/node_modules/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('panel/assets/node_modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('panel/main/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('panel/main/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('panel/main/js/custom.min.js') }}"></script>
</body>

</html>