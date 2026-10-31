<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('logo/logo.png') }}">

@if (app()->getLocale() == 'en')
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
@else
    <link href="{{ asset('assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
@endif
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/simple-datatables/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />

{{-- import fontawsome 6 --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

@yield('css')

<!-- Icons -->
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

<script src="{{ asset('assets/js/head.js') }}"></script>
