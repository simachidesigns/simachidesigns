@extends('layouts.site')
@section('title', 'Studio login')

@section('content')
    <section class="section">
        <form class="panel" method="post" action="{{ route('login') }}" style="max-width: 460px; margin: 0 auto;">
            @csrf
            <p class="kicker">Studio</p>
            <h1>Sign in</h1>
            <label style="margin-top: 24px;">Email
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            </label>
            <label>Password
                <input type="password" name="password" required>
            </label>
            <label class="check"><input type="checkbox" name="remember" value="1"> Remember this browser</label>
            @if ($errors->any())
                <p class="error">{{ $errors->first() }}</p>
            @endif
            <button class="btn btn-dark" type="submit">Enter</button>
        </form>
    </section>
@endsection
