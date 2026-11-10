@extends('layouts.admin')
@section('title', 'Stories')
@section('content')
    <div class="section-head">
        <h1>Stories</h1>
        <a class="btn btn-dark" href="{{ route('admin.articles.create') }}">New story</a>
    </div>
    <table class="table">
        <thead><tr><th>Title</th><th>Published</th><th></th></tr></thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->published_on->format('M j, Y') }}</td>
                    <td class="admin-actions">
                        <a href="{{ route('admin.articles.edit', $article) }}">Edit</a>
                        <form method="post" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Remove this story?')">
                            @csrf @method('DELETE')
                            <button class="danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $articles->links() }}
@endsection
