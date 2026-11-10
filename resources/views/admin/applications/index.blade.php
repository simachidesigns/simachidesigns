@extends('layouts.admin')
@section('title', 'Applications')
@section('content')
    <h1>Applications</h1>
    <table class="table">
        <thead><tr><th>Candidate</th><th>Role</th><th>Note</th></tr></thead>
        <tbody>
            @forelse ($applications as $application)
                <tr>
                    <td>{{ $application->name }} @if($application->is_new) · new @endif<br><small>{{ $application->email }} · {{ $application->phone }}</small></td>
                    <td>{{ $application->opening->title ?? 'Open application' }}</td>
                    <td>{{ $application->message }}</td>
                </tr>
            @empty
                <tr><td colspan="3">No applications yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $applications->links() }}
@endsection
