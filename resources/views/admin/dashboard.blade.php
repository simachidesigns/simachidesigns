@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <p class="kicker">Studio</p>
    <h1>Good to see you.</h1>
    <div class="stats" style="margin: 28px 0; color: inherit;">
        <div class="stat"><strong style="color:#12100e;">{{ $counts['projects'] }}</strong><span style="color:#6f675e;">Projects</span></div>
        <div class="stat"><strong style="color:#12100e;">{{ $counts['articles'] }}</strong><span style="color:#6f675e;">Stories</span></div>
        <div class="stat"><strong style="color:#12100e;">{{ $counts['inquiries'] }}</strong><span style="color:#6f675e;">New enquiries</span></div>
        <div class="stat"><strong style="color:#12100e;">{{ $counts['applications'] }}</strong><span style="color:#6f675e;">New applications</span></div>
    </div>
    <h2>Latest enquiries</h2>
    <table class="table">
        <thead><tr><th>Name</th><th>Interest</th><th>Message</th><th>When</th></tr></thead>
        <tbody>
            @forelse ($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->name }}<br><small>{{ $inquiry->email }}</small></td>
                    <td>{{ $inquiry->interest }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($inquiry->message, 120) }}</td>
                    <td>{{ $inquiry->created_at->diffForHumans() }}</td>
                </tr>
            @empty
                <tr><td colspan="4">No enquiries yet.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
