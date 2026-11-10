@extends('layouts.site')
@section('title', 'Services — Atmosphere')

@section('content')
    <header class="page-hero">
        <p class="kicker">Services</p>
        <h1>From the first idea to the finished floor.</h1>
        <p>Stay with us for design only, for manufacturing against your drawings, or for a full design-and-build delivery.</p>
    </header>
    <div class="grid-3">
        @foreach ($offerings as $service)
            <a class="tile" href="{{ route('services.show', $service) }}">
                <div>
                    <small class="kicker">Offering</small>
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->excerpt }}</p>
                </div>
            </a>
        @endforeach
        @foreach ($segments as $service)
            <a class="tile" href="{{ route('services.show', $service) }}">
                <div>
                    <small class="kicker">Segment</small>
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->excerpt }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
