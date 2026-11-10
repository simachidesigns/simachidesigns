@extends('layouts.admin')
@section('title', 'Enquiries')
@section('content')
    <h1>Enquiries</h1>
    <table class="table">
        <thead><tr><th>From</th><th>Interest</th><th>Message</th><th></th></tr></thead>
        <tbody>
            @forelse ($inquiries as $inquiry)
                <tr>
                    <td>
                        {{ $inquiry->name }} @if($inquiry->is_new) · new @endif
                        <br><small>{{ $inquiry->email }} · {{ $inquiry->phone }}</small>
                        <br><small>{{ $inquiry->company }}</small>
                    </td>
                    <td>{{ $inquiry->interest }}</td>
                    <td>{{ $inquiry->message }}</td>
                    <td>
                        <form method="post" action="{{ route('admin.inquiries.destroy', $inquiry) }}">
                            @csrf @method('DELETE')
                            <button class="danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No enquiries yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $inquiries->links() }}
@endsection
