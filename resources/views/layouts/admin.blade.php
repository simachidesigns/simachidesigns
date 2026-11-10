<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Studio') — Atmosphere</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    <div class="admin-body">
        <aside class="side">
            <a class="brand" href="{{ route('home') }}"><span class="brand-mark">atm<span>ó</span>sphere</span></a>
            <a href="{{ route('admin.dashboard') }}" @class(['is-active' => request()->routeIs('admin.dashboard')])>Dashboard</a>
            <a href="{{ route('admin.projects.index') }}" @class(['is-active' => request()->routeIs('admin.projects.*')])>Projects</a>
            <a href="{{ route('admin.articles.index') }}" @class(['is-active' => request()->routeIs('admin.articles.*')])>Stories</a>
            <a href="{{ route('admin.openings.index') }}" @class(['is-active' => request()->routeIs('admin.openings.*')])>Careers</a>
            <a href="{{ route('admin.inquiries.index') }}" @class(['is-active' => request()->routeIs('admin.inquiries.*')])>Enquiries</a>
            <a href="{{ route('admin.applications.index') }}" @class(['is-active' => request()->routeIs('admin.applications.*')])>Applications</a>
            <a href="{{ route('admin.settings.edit') }}" @class(['is-active' => request()->routeIs('admin.settings.*')])>Settings</a>
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button class="danger" type="submit" style="color:#e7cb8a;padding:10px 8px;">Sign out</button>
            </form>
        </aside>
        <div class="admin-main">
            @if (session('status'))
                <div class="toast" style="margin: 0 0 16px;">{{ session('status') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>
