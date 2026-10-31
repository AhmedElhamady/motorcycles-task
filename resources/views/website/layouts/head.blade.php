<title>@yield('title', env('APP_NAME'))</title>

<link rel="icon" type="image/png" href="{{ asset('logo/favicon.png') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#FF742D',
                    navy: '#10364F',
                    muted: '#7E94A4',
                    pale: '#F0F5F8',
                    offwhite: '#F5F8FA',
                    line: '#DFE7EC'
                },
                fontFamily: {
                    sans: ['Inter', 'system-ui', 'sans-serif']
                },
                maxWidth: {
                    page: '1440px'
                },
                boxShadow: {
                    card: '0 12px 30px rgba(16,54,79,.09)'
                }
            }
        }
    }
</script>

<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
<link rel="stylesheet" href="{{ asset('website/css/style.css') }}">

@yield('css')
