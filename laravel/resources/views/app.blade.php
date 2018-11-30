<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Template')</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400i" rel="stylesheet">
    {{--<link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon-32x32.png') }}" sizes="32x32" />--}}
    {{--<link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon-16x16.png') }}" sizes="16x16" />--}}
    @section('css')
        <link rel="stylesheet" href="{{ asset('/assets/front/css/vendor.css') }}?v={{ $version }}">
        <link rel="stylesheet" href="{{ asset('/assets/front/css/style.css') }}?v={{ $version }}">
    @show
</head>
<body>
@php(include('assets/front/svg/shapes.svg'))
<div class="Site">

    @include('front.partials.header')

    {{-- Main Content --}}
    <div class="Site-content content pt-lg-5">
        @yield('content')

    </div>
    {{-- End Main Content --}}
    <div class="footer py-5 border-top">
        <ul class="nav flex-column flex-md-row justify-content-center align-items-center">
            <li class="nav-item ml-md-5 pt-2">
                <a href="{{ route('front.gdpr') }}">Условия и права за ползване</a>
            </li>
            <li class="nav-item ml-md-5 pt-2">
                <a href="#">Авторски права</a>
            </li>
            <li class="nav-item ml-md-5 pt-2">
                <a href="#">Абониране за бюлетин</a>
            </li>
        </ul>
    </div>
</div>
{{-- End wrapper --}}
@section('js')
    <script src="{{ asset('/assets/front/js/vendor.js') }}?v={{ $version }}"></script>
    <script src="{{ asset('/assets/front/js/bundle.js') }}?v={{ $version }}"></script>
    @if (env('APP_ENV') == 'local')
        <script src="http://localhost:35730/livereload.js?snipver=1"></script> @endif
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
        });
    </script>
@show
</body>
</html>
