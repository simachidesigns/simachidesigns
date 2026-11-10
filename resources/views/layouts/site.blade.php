<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Atmosphere — The Store Makers')</title>
    <meta name="description" content="@yield('description', 'Atmosphere designs and builds retail, jewellery, workspace, and hospitality spaces from Mumbai and Dubai.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    @include('partials.nav')
    @if (session('status'))
        <div class="toast">{{ session('status') }}</div>
    @endif
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    <a class="whatsapp" href="https://wa.me/{{ $site['whatsapp'] }}" target="_blank" rel="noopener" aria-label="WhatsApp">WA</a>
    <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
