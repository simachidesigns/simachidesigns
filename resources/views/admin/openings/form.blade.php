@extends('layouts.admin')
@section('title', $opening->exists ? 'Edit role' : 'New role')
@section('content')
    <h1>{{ $opening->exists ? 'Edit role' : 'New role' }}</h1>
    <form class="panel" method="post" action="{{ $opening->exists ? route('admin.openings.update', $opening) : route('admin.openings.store') }}" style="margin-top: 20px;">
        @csrf
        @if ($opening->exists) @method('PUT') @endif
        <label>Title <input name="title" value="{{ old('title', $opening->title) }}" required></label>
        <label>Slug <input name="slug" value="{{ old('slug', $opening->slug) }}"></label>
        <label>Department <input name="department" value="{{ old('department', $opening->department) }}" required></label>
        <label>Summary <input name="summary" value="{{ old('summary', $opening->summary) }}" required></label>
        <label>Responsibilities <textarea name="responsibilities" required>{{ old('responsibilities', $opening->responsibilities) }}</textarea></label>
        <label>Qualifications <textarea name="qualifications" required>{{ old('qualifications', $opening->qualifications) }}</textarea></label>
        <label class="check">
            <input type="checkbox" name="is_open" value="1" @checked(old('_token') ? old('is_open') : ($opening->is_open ?? true))>
            Open for applications
        </label>
        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif
        <button class="btn btn-dark" type="submit">Save</button>
    </form>
@endsection
