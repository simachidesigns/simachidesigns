@extends('layouts.admin')
@section('title', 'Projects')
@section('content')
    <div class="section-head">
        <h1>Projects</h1>
        <a class="btn btn-dark" href="{{ route('admin.projects.create') }}">New project</a>
    </div>
    <table class="table">
        <thead><tr><th>Title</th><th>Category</th><th>City</th><th></th></tr></thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->categoryLabel() }}</td>
                    <td>{{ $project->city }}</td>
                    <td class="admin-actions">
                        <a href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                        <form method="post" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Remove this project?')">
                            @csrf
                            @method('DELETE')
                            <button class="danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $projects->links() }}
@endsection
