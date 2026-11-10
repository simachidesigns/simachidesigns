@extends('layouts.site')

@section('content')
    <section class="hero">
        <div class="hero-copy">
            <p class="kicker">{{ $site['hero_kicker'] }}</p>
            <h1>{{ $site['hero_title'] }}</h1>
            <p class="lede">{{ $site['hero_text'] }}</p>
            <div class="hero-actions">
                <a class="btn" href="{{ route('projects') }}">View projects</a>
                <a class="btn btn-ghost" href="{{ route('contact') }}">Start a conversation</a>
            </div>
        </div>
        <div class="hero-visual">
            <img src="{{ $site['hero_image'] }}" alt="A luminous retail interior prepared for a new collection">
            <div class="floating-card">
                <strong>{{ $projectCount }}</strong>
                <span>Spaces in the archive</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-head">
            <div>
                <p class="kicker">01 — How we partner</p>
                <h2>Five ways to make a room.</h2>
            </div>
            <p>Design, build, fixtures, or the whole path from a sketch to the last screw. Choose the depth of partnership that fits the brief.</p>
        </div>
        <div class="services">
            @foreach ($offerings as $service)
                <a class="service-card" href="{{ route('services.show', $service) }}">
                    <em>0{{ $loop->iteration }}</em>
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->excerpt }}</p>
                </a>
            @endforeach
        </div>
    </section>

    <section class="section band">
        <div class="stats">
            <div class="stat"><strong>{{ $segments->count() }}</strong><span>Industry segments</span></div>
            <div class="stat"><strong>2</strong><span>Studios, Mumbai & Dubai</span></div>
            <div class="stat"><strong>{{ $projectCount }}</strong><span>Projects on record</span></div>
            <div class="stat"><strong>1</strong><span>In-house factory</span></div>
        </div>
    </section>

    @if ($clients->isNotEmpty())
        <div class="marquee" aria-label="Clients">
            <div class="marquee-track">
                @foreach ($clients as $client)<span>{{ $client->name }}</span>@endforeach
                @foreach ($clients as $client)<span>{{ $client->name }}</span>@endforeach
            </div>
        </div>
    @endif

    <section class="section">
        <div class="section-head">
            <div>
                <p class="kicker">02 — Selected work</p>
                <h2>Rooms with a point of view.</h2>
            </div>
            <a class="btn btn-dark" href="{{ route('projects') }}">All projects</a>
        </div>
        <div class="mosaic">
            @foreach ($projects as $project)
                <a class="project-card" href="{{ route('projects.show', $project) }}">
                    <img src="{{ $project->image }}" alt="{{ $project->title }}">
                    <div class="project-meta">
                        <small>{{ $project->categoryLabel() }} @if($project->city) · {{ $project->city }} @endif</small>
                        <h3>{{ $project->title }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section class="section band">
        <div class="pillars">
            <div>
                <p class="kicker">03 — Excellence in action</p>
                <h2 class="quote">We shape a brand’s idea into a room people remember.</h2>
                <p class="lede">Design, manufacturing, sourcing, and project management stay under one roof, so the drawing and the delivered space still recognise each other.</p>
            </div>
            <div class="pillar-list">
                <article class="pillar"><h3>Design</h3><p>Intent first. Planning that protects the feeling of the brand.</p></article>
                <article class="pillar"><h3>Make</h3><p>Fixtures and furniture from an in-house factory, tuned to the last detail.</p></article>
                <article class="pillar"><h3>Source</h3><p>Materials chosen for how they age, not only how they photograph.</p></article>
                <article class="pillar"><h3>Lead</h3><p>One team from site measure to handover, on time and in budget.</p></article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-head">
            <div>
                <p class="kicker">04 — In the press</p>
                <h2>Featured conversations.</h2>
            </div>
            <a class="btn btn-dark" href="{{ route('media') }}">All stories</a>
        </div>
        <div class="stories">
            @foreach ($articles as $article)
                <a class="story" href="{{ route('media.show', $article) }}">
                    <img src="{{ $article->image }}" alt="">
                    <div>
                        <time>{{ $article->published_on->format('F j, Y') }}</time>
                        <h3>{{ $article->title }}</h3>
                        <p>{{ $article->excerpt }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section class="section" style="padding-top: 0;">
        <div class="section-head">
            <div>
                <p class="kicker">05 — Questions</p>
                <h2>Clear answers, before the first drawing.</h2>
            </div>
        </div>
        <div class="faq">
            @foreach ($faqs as $faq)
                <details>
                    <summary>{{ $faq->question }}</summary>
                    <p>{{ $faq->answer }}</p>
                </details>
            @endforeach
        </div>
    </section>
@endsection
