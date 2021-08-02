<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet"
        type="text/css" />
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ route('home') }}">User Area</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item @if(Request::is('/home')) active @endif">
                            <a href="{{ route('home') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if(Request::is('/article')) active @endif">
                            <a href="{{ route('addarticle') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Article</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if(Request::is('/people')) active @endif">
                            <a href="{{ route('people') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>People Data</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="d-flex justify-content-between">
                    <h3></h3>
                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-danger"><i class="mdi mdi-logout-variant"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>


            </div>
            <div class="page-content">

                <section class="row">
                    @include('sweet::alert')
                    @yield('content')
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted fixed-bottom">
                    <div class="float-start">
                    </div>
                    <div class="float-end">

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('asset/admin') }}/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('asset/admin') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('asset/admin') }}/js/pages/dashboard.js"></script>
    <script src="{{ asset('asset/admin') }}/js/main.js"></script>
</body>

</html>