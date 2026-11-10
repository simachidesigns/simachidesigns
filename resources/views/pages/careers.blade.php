@extends('layouts.site')
@section('title', 'Careers — Atmosphere')

@section('content')
    <header class="page-hero">
        <p class="kicker">Careers</p>
        <h1>Grow together. Thrive together.</h1>
        <p>Atmosphere is a workplace built on empathy, cooperation, and the chance to make rooms that outlast a season. Design, manufacturing, and the people who hold both together.</p>
    </header>
    <section class="section" style="padding-top: 0;">
        <div class="two">
            <div class="jobs">
                @forelse ($openings as $opening)
                    <article class="job" id="{{ $opening->slug }}">
                        <p class="kicker">{{ $opening->department }}</p>
                        <h3>{{ $opening->title }}</h3>
                        <p>{{ $opening->summary }}</p>
                        <h4>Responsibilities</h4>
                        <ul>
                            @foreach (preg_split("/\r\n|\n|\r/", $opening->responsibilities) as $line)
                                @if (trim($line) !== '')
                                    <li>{{ $line }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <h4>What you bring</h4>
                        <p>{{ $opening->qualifications }}</p>
                    </article>
                @empty
                    <p>No open roles right now. Send a note anyway — good people are always worth a conversation.</p>
                @endforelse
            </div>
            <form class="panel" method="post" action="{{ route('careers.apply') }}">
                @csrf
                <p class="kicker">Apply</p>
                <h2>Tell us where you fit.</h2>
                <label>Role
                    <select name="opening_id">
                        <option value="">Open application</option>
                        @foreach ($openings as $opening)
                            <option value="{{ $opening->id }}" @selected(old('opening_id') == $opening->id)>{{ $opening->title }}</option>
                        @endforeach
                    </select>
                </label>
                <label>Name
                    <input name="name" value="{{ old('name') }}" required>
                </label>
                <label>Email
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </label>
                <label>Phone
                    <input name="phone" value="{{ old('phone') }}">
                </label>
                <label>Note
                    <textarea name="message">{{ old('message') }}</textarea>
                </label>
                @if ($errors->any())
                    <p class="error">{{ $errors->first() }}</p>
                @endif
                <button class="btn btn-dark" type="submit">Send application</button>
            </form>
        </div>
    </section>
@endsection
