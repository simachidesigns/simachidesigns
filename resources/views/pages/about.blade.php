@extends('layouts.site')
@section('title', 'About Atmosphere — The Store Makers')

@section('content')
    <header class="page-hero">
        <p class="kicker">About</p>
        <h1>A one-stop studio for spaces that feel considered.</h1>
        <p>Atmosphere is a design-and-build partner for premium retail, jewellery, workspace, and hospitality. The promise is simple: trust, craft, and a room that still works on a busy Saturday.</p>
    </header>

    <section class="section" style="padding-top: 10px;">
        <div class="split">
            <img class="portrait" src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1600&q=80" alt="A calm, material-rich interior">
            <div>
                <p class="kicker">The promise</p>
                <h2 class="quote">Empathy in the team. Precision in the work.</h2>
                <p>We build studios around cooperation and authenticity, and we hold sustainability as a design requirement — not a slide at the end of the deck. Every project is a test of intent: function and elegance in the same line.</p>
                <div class="rule"></div>
                <p><strong>Purposeful design.</strong> Concepts that carry a brand’s character without losing the practical life of the store.</p>
                <p><strong>Manufacturing excellence.</strong> An in-house factory in Bhiwandi builds fixtures and furniture, from small jewellery details to full transformations.</p>
                <p><strong>Sustainability.</strong> Material choices stay conscious of impact while protecting luxury, performance, and the way a space feels in the hand.</p>
            </div>
        </div>
    </section>

    <section class="section band">
        <p class="kicker">Where we work</p>
        <div class="services" style="margin-top: 24px;">
            @foreach ($segments as $segment)
                <a class="service-card" href="{{ route('services.show', $segment) }}" style="background: transparent; color: inherit;">
                    <em>Segment</em>
                    <h3>{{ $segment->title }}</h3>
                    <p>{{ $segment->excerpt }}</p>
                </a>
            @endforeach
        </div>
    </section>

    <section class="section">
        <p class="kicker">The driving force</p>
        @foreach ($team as $member)
            <div class="split" style="margin-top: 24px;">
                <div>
                    <h2>{{ $member->name }}</h2>
                    <p class="kicker">{{ $member->role }}</p>
                    @foreach (explode("\n\n", $member->bio) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
                <img class="portrait" src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1400&q=80" alt="A studio workspace">
            </div>
        @endforeach
    </section>
@endsection
