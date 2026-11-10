@extends('layouts.site')
@section('title', $article->title.' — Atmosphere')

@section('content')
    <header class="page-hero">
        <p class="kicker">{{ $article->published_on->format('F j, Y') }}</p>
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->excerpt }}</p>
    </header>
    <article class="article">
        @if ($article->image)
            <img src="{{ $article->image }}" alt="">
        @endif
        @foreach (explode("\n\n", $article->body) as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
    </article>
@endsection
