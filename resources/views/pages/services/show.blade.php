@extends('layouts.site')
@section('title', $service->title.' — Atmosphere')

@section('content')
    <header class="page-hero">
        <p class="kicker">{{ $service->type === 'segment' ? 'Segment' : 'Service' }}</p>
        <h1>{{ $service->title }}</h1>
        <p>{{ $service->excerpt }}</p>
    </header>
    <article class="article">
        @foreach (explode("\n\n", $service->body) as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
        <a class="btn btn-dark" href="{{ route('contact') }}">Discuss this service</a>
    </article>
    @if ($projects->isNotEmpty())
        <div class="grid-3">
            @foreach ($projects as $project)
                <a class="tile" href="{{ route('projects.show', $project) }}">
                    <img src="{{ $project->image }}" alt="">
                    <div>
                        <small class="kicker">{{ $project->categoryLabel() }}</small>
                        <h3>{{ $project->title }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
    @if ($related->isNotEmpty())
        <div class="filters">
            @foreach ($related as $item)
                <a href="{{ route('services.show', $item) }}">{{ $item->title }}</a>
            @endforeach
        </div>
    @endif
@endsection
