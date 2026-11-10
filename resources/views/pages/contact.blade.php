@extends('layouts.site')
@section('title', 'Contact — Atmosphere')

@section('content')
    <header class="page-hero">
        <p class="kicker">Contact</p>
        <h1>Get in touch.</h1>
        <p>We are here to answer questions and talk about how a brief becomes a room.</p>
    </header>
    <section class="section" style="padding-top: 0;">
        <div class="contact-grid">
            <div class="panel">
                <p class="kicker">Head office</p>
                <h2>{{ $site['office'] }}</h2>
                <p class="kicker">Factory</p>
                <p>{{ $site['factory'] }}</p>
                <p><a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a></p>
                <p><a href="tel:{{ $site['phone_href'] }}">{{ $site['phone'] }}</a></p>
                <p>Mumbai · Dubai</p>
            </div>
            <form class="panel" method="post" action="{{ route('contact.store') }}">
                @csrf
                <label>Name
                    <input name="name" value="{{ old('name') }}" required>
                </label>
                <label>Email
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </label>
                <label>Phone
                    <input name="phone" value="{{ old('phone') }}">
                </label>
                <label>Company
                    <input name="company" value="{{ old('company') }}">
                </label>
                <label>Interest
                    <select name="interest">
                        <option value="">Select a service</option>
                        @foreach ($offerings as $service)
                            <option value="{{ $service->title }}" @selected(old('interest') === $service->title)>{{ $service->title }}</option>
                        @endforeach
                    </select>
                </label>
                <label>Message
                    <textarea name="message" required>{{ old('message') }}</textarea>
                </label>
                @if ($errors->any())
                    <p class="error">{{ $errors->first() }}</p>
                @endif
                <button class="btn btn-dark" type="submit">Send message</button>
            </form>
        </div>
    </section>
@endsection
