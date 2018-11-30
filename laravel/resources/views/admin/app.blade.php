<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin Panel')</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    @section('css')
        <link rel="stylesheet" href="{{ asset('/assets/admin/css/vendor.css') }}?v={{ $version }}">
        <link rel="stylesheet" href="{{ asset('/assets/admin/css/style.css') }}?v={{ $version }}">
        <link rel="stylesheet" href="{{ asset('/assets/admin/css/select2.min.css') }}?v={{ $version }}">
        <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    @show
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show edit">
@php(include('assets/admin/svg/trumbowyg.svg'))

<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand justify-content-start bg-darker" href="/">
        <img class="navbar-brand-full" src="{{ asset("/assets/front/img/logo.png") }}" width="89" alt="">
        <img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none px-4">
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button class="nav-link"><i class="icon-logout"></i> Logout</button>
            </form>
        </li>
    </ul>
</header>

<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                @foreach($adminMenu as $item)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route($item['route']) }}">
                        <i class="nav-icon {{ $item['icon'] }} text-white"></i>
                        <span>&nbsp;{{ $item['name'] }}</span>
                    </a>
                    @if ($item['name'] == \App\Http\Controllers\Admin\PagesController::$menu['name'])
                        @yield('builder')
                    @endif
                </li>
                @endforeach
            </ul>
        </nav>
    </div>

    @yield('content')
</div>

<footer class="app-footer small">
    <div>
        <span>Created by</span>
        <a href="http://jetspark.io">JetSpark</a>

    </div>
    <div class="ml-auto">
        <span>version: {{ $version }}</span>
    </div>
</footer>

@section('js')
    <script src="{{ asset('/assets/admin/js/vendor.js') }}?v={{ $version }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('/assets/admin/js/bundle.js') }}?v={{ $version }}"></script>
    @if (env('APP_ENV') == 'local') <script src="http://localhost:35730/livereload.js?snipver=1"></script> @endif
@show

@php(include('assets/admin/svg/shapes.svg'))
</body>
</html>
