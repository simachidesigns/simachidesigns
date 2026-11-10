@extends('layouts.site')
@section('title', 'Media — Atmosphere')

@section('content')
    <header class="page-hero">
        <p class="kicker">Media</p>
        <h1>Notes from the studio and the press.</h1>
        <p>Stories about retail craft, jewellery environments, and the rooms Atmosphere has shaped.</p>
    </header>
    <div class="grid-3">
        @foreach ($articles as $article)
            <a class="tile" href="{{ route('media.show', $article) }}">
                <img src="{{ $article->image }}" alt="">
                <div>
                    <time class="kicker">{{ $article->published_on->format('F j, Y') }}</time>
                    <h3>{{ $article->title }}</h3>
                    <p>{{ $article->excerpt }}</p>
                </div>
            </a>
        @endforeach
    </div>
    {{ $articles->links() }}
@endsection
