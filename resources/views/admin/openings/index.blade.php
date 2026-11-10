@extends('layouts.admin')
@section('title', 'Roles')
@section('content')
    <div class="section-head">
        <h1>Open roles</h1>
        <a class="btn btn-dark" href="{{ route('admin.openings.create') }}">New role</a>
    </div>
    <table class="table">
        <thead><tr><th>Title</th><th>Department</th><th>Status</th><th></th></tr></thead>
        <tbody>
            @foreach ($openings as $opening)
                <tr>
                    <td>{{ $opening->title }}</td>
                    <td>{{ $opening->department }}</td>
                    <td>{{ $opening->is_open ? 'Open' : 'Closed' }}</td>
                    <td class="admin-actions">
                        <a href="{{ route('admin.openings.edit', $opening) }}">Edit</a>
                        <form method="post" action="{{ route('admin.openings.destroy', $opening) }}" onsubmit="return confirm('Remove this role?')">
                            @csrf @method('DELETE')
                            <button class="danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $openings->links() }}
@endsection
