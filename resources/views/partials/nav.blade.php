<header class="nav">
    <a class="brand" href="{{ route('home') }}">
        <span class="brand-mark">atm<span>ó</span>sphere</span>
        <small>The Store Makers</small>
    </a>
    <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="site-nav">Menu</button>
    <nav id="site-nav" class="nav-links" data-nav>
        <a href="{{ route('home') }}" @class(['is-active' => request()->routeIs('home')])>Home</a>
        <a href="{{ route('about') }}" @class(['is-active' => request()->routeIs('about')])>About</a>
        <details class="menu">
            <summary>Services</summary>
            <div class="menu-panel">
                @foreach ($navOfferings as $item)
                    <a href="{{ route('services.show', $item) }}">{{ $item->title }}</a>
                @endforeach
                @foreach ($navSegments as $item)
                    <a href="{{ route('services.show', $item) }}">{{ $item->title }}</a>
                @endforeach
            </div>
        </details>
        <a href="{{ route('projects') }}" @class(['is-active' => request()->routeIs('projects*')])>Projects</a>
        <a href="{{ route('media') }}" @class(['is-active' => request()->routeIs('media*')])>Media</a>
        <a href="{{ route('careers') }}" @class(['is-active' => request()->routeIs('careers')])>Careers</a>
        <a href="{{ route('contact') }}" @class(['is-active' => request()->routeIs('contact')])>Contact</a>
    </nav>
</header>
