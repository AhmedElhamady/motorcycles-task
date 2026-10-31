<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow">
    <meta name="description"
        content="Motorcycle Group — discover premium motorcycle brands, riding styles, and the perfect motorcycle for your next adventure.">
    @include('website.layouts.head')
</head>

<body>
    @include('website.layouts.nav')
    <main id="main" class="overflow-hidden">
        @yield('content')
    </main>
    @include('website.layouts.footer')
    @include('website.layouts.footer-scripts')

</body>

</html>
