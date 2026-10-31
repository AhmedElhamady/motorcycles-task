<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', env('APP_NAME'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @include('layouts.dashboard.head')
</head>

<body data-menu-color="dark" data-sidebar="default">
    <div id="app-layout">
        @include('layouts.dashboard.nav')
        @include('layouts.dashboard.sidebar')
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @include('layouts.dashboard.partials.alerts')
                    @yield('content')
                </div>
            </div>
            @include('layouts.dashboard.footer')
        </div>
    </div>
    @include('layouts.dashboard.footer-scripts')
</body>

</html>
