@extends('layouts.site')
@section('title', $project->title.' — Atmosphere')

@section('content')
    <header class="page-hero">
        <p class="kicker">{{ $project->categoryLabel() }} @if($project->city) · {{ $project->city }} @endif @if($project->year) · {{ $project->year }} @endif</p>
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->summary }}</p>
    </header>
    <article class="article">
        @if ($project->image)
            <img src="{{ $project->image }}" alt="{{ $project->title }}">
        @endif
        @foreach (explode("\n\n", $project->body) as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
        <a class="btn btn-dark" href="{{ route('contact') }}">Plan a space like this</a>
    </article>
    @if ($related->isNotEmpty())
        <div class="grid-3">
            @foreach ($related as $item)
                <a class="tile" href="{{ route('projects.show', $item) }}">
                    <img src="{{ $item->image }}" alt="">
                    <div>
                        <small class="kicker">{{ $item->categoryLabel() }}</small>
                        <h3>{{ $item->title }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
@endsection
