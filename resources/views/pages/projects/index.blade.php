@extends('layouts.site')
@section('title', 'Projects — Atmosphere')

@section('content')
    <header class="page-hero">
        <p class="kicker">Projects</p>
        <h1>Redefining projects, one space at a time.</h1>
        <p>Apparel, jewellery, hospitality, food, and the workplaces behind the brands.</p>
    </header>
    <div class="filters">
        <a href="{{ route('projects') }}" @class(['is-active' => $category === ''])>All</a>
        @foreach ($categories as $key => $label)
            <a href="{{ route('projects', ['category' => $key]) }}" @class(['is-active' => $category === $key])>{{ $label }}</a>
        @endforeach
    </div>
    <div class="grid-3">
        @forelse ($projects as $project)
            <a class="tile" href="{{ route('projects.show', $project) }}">
                <img src="{{ $project->image }}" alt="{{ $project->title }}">
                <div>
                    <small class="kicker">{{ $project->categoryLabel() }} @if($project->city) · {{ $project->city }} @endif</small>
                    <h3>{{ $project->title }}</h3>
                    <p>{{ $project->summary }}</p>
                </div>
            </a>
        @empty
            <p>No projects in this category yet.</p>
        @endforelse
    </div>
    {{ $projects->links() }}
@endsection
