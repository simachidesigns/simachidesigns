<footer class="footer">
    <div class="footer-grid">
        <div>
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark">atm<span>ó</span>sphere</span>
                <small>The Store Makers</small>
            </a>
            <p>Premium fit-outs, fixtures, and furniture for brands that want a room to feel inevitable.</p>
        </div>
        <div>
            <h3>Visit</h3>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('projects') }}">Projects</a>
            <a href="{{ route('media') }}">Media</a>
            <a href="{{ route('careers') }}">Careers</a>
        </div>
        <div>
            <h3>Studios</h3>
            <p>Office · {{ $site['office'] }}</p>
            <p>Factory · {{ $site['factory'] }}</p>
            <a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a>
            <a href="tel:{{ $site['phone_href'] }}">{{ $site['phone'] }}</a>
        </div>
        <div>
            <h3>Social</h3>
            <a href="{{ $site['instagram'] }}" target="_blank" rel="noopener">Instagram</a>
            <a href="{{ $site['linkedin'] }}" target="_blank" rel="noopener">LinkedIn</a>
            <a href="{{ $site['facebook'] }}" target="_blank" rel="noopener">Facebook</a>
            <a href="{{ $site['youtube'] }}" target="_blank" rel="noopener">YouTube</a>
            <a href="{{ $site['pinterest'] }}" target="_blank" rel="noopener">Pinterest</a>
        </div>
    </div>
    <div class="legal">
        <span>© {{ date('Y') }} Atmosphere. All rights reserved.</span>
        <span>
            <a href="{{ route('privacy') }}">Privacy</a>
            ·
            <a href="{{ route('terms') }}">Terms</a>
        </span>
    </div>
</footer>
