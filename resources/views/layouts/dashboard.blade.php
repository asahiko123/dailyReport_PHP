<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @section('scripts')
    @show

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- icons -->
    <script src="https://unpkg.com/feather-icons"></script>

</head>
<body>

    <div id="app">

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-top col-md-3 col-lg-2 me-0 px-3" href="#">日報アプリ</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                <!-- <a class="nav-link" href="#">Sign out</a> -->

                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </li>
            </ul>
        </header>

        <div class="container-fluid py-5">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('dailyReport.index')}}">
                                <span data-feather="home"></span>
                                    日報入力フォーム
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('staff.index')}}">
                                <span data-feather="user"></span>
                                    スタッフマスタ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('workDiv.index')}}">
                                <span data-feather="shopping-cart"></span>
                                    作業区分マスタ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('supplier.index')}}">
                                <span data-feather="users"></span>
                                    取引先マスタ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('labor.index')}}">
                                <span data-feather="bar-chart-2"></span>
                                    労務管理マスタ
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                @yield('content')

                </main>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/feather.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/sidebar.js')}}"></script>
</body>
</html>
