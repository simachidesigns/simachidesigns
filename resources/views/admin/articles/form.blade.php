@extends('layouts.admin')
@section('title', $article->exists ? 'Edit story' : 'New story')
@section('content')
    <h1>{{ $article->exists ? 'Edit story' : 'New story' }}</h1>
    <form class="panel" method="post" action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}" style="margin-top: 20px;">
        @csrf
        @if ($article->exists) @method('PUT') @endif
        <label>Title <input name="title" value="{{ old('title', $article->title) }}" required></label>
        <label>Slug <input name="slug" value="{{ old('slug', $article->slug) }}"></label>
        <label>Excerpt <input name="excerpt" value="{{ old('excerpt', $article->excerpt) }}" required></label>
        <label>Body <textarea name="body" required>{{ old('body', $article->body) }}</textarea></label>
        <label>Image URL <input name="image" value="{{ old('image', $article->image) }}"></label>
        <label>Published
            <input type="date" name="published_on" value="{{ old('published_on', optional($article->published_on)->format('Y-m-d')) }}" required>
        </label>
        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif
        <button class="btn btn-dark" type="submit">Save</button>
    </form>
@endsection
