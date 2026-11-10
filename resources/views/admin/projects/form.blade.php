@extends('layouts.admin')
@section('title', $project->exists ? 'Edit project' : 'New project')
@section('content')
    <h1>{{ $project->exists ? 'Edit project' : 'New project' }}</h1>
    <form class="panel" method="post" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" style="margin-top: 20px;">
        @csrf
        @if ($project->exists) @method('PUT') @endif
        <label>Title <input name="title" value="{{ old('title', $project->title) }}" required></label>
        <label>Slug <input name="slug" value="{{ old('slug', $project->slug) }}" placeholder="Leave blank to generate"></label>
        <label>Category
            <select name="category" required>
                @foreach (\App\Models\Project::CATEGORIES as $key => $label)
                    <option value="{{ $key }}" @selected(old('category', $project->category) === $key)>{{ $label }}</option>
                @endforeach
            </select>
        </label>
        <label>City <input name="city" value="{{ old('city', $project->city) }}"></label>
        <label>Year <input type="number" name="year" value="{{ old('year', $project->year) }}"></label>
        <label>Summary <input name="summary" value="{{ old('summary', $project->summary) }}" required></label>
        <label>Story <textarea name="body" required>{{ old('body', $project->body) }}</textarea></label>
        <label>Image URL <input name="image" value="{{ old('image', $project->image) }}"></label>
        <label>Sort order <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? 0) }}"></label>
        <label class="check">
            <input type="checkbox" name="featured" value="1" @checked(old('_token') ? old('featured') : $project->featured)>
            Feature on the home page
        </label>
        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif
        <button class="btn btn-dark" type="submit">Save</button>
    </form>
@endsection
