@extends('layouts.site')
@section('title', ($page === 'privacy' ? 'Privacy' : 'Terms').' — Atmosphere')

@section('content')
    <header class="page-hero">
        <p class="kicker">Studio</p>
        <h1>{{ $page === 'privacy' ? 'Privacy' : 'Terms of use' }}</h1>
    </header>
    <article class="article">
        @if ($page === 'privacy')
            <p>Messages sent through the contact form and career applications are stored so the studio can reply. We keep your name, email, phone, company, and the note you wrote. We do not sell that information.</p>
            <p>You can ask us to delete an enquiry by writing to {{ $site['email'] }}.</p>
        @else
            <p>This website presents Atmosphere’s design and build work. Project descriptions are summaries for conversation, not a contract. Fees, timelines, and scope are agreed in writing before work begins.</p>
            <p>Photographs on this build are representative interiors used to present the archive. Brand names refer to publicly discussed projects.</p>
        @endif
    </article>
@endsection
