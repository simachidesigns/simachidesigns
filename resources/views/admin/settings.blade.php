@extends('layouts.admin')
@section('title', 'Settings')
@section('content')
    <h1>Studio settings</h1>
    <form class="panel" method="post" action="{{ route('admin.settings.update') }}" style="margin-top: 20px;">
        @csrf
        @method('PUT')
        @foreach ([
            'phone' => 'Phone',
            'phone_href' => 'Phone link',
            'email' => 'Email',
            'office' => 'Office',
            'factory' => 'Factory',
            'whatsapp' => 'WhatsApp number',
            'hero_kicker' => 'Hero kicker',
            'hero_title' => 'Hero title',
            'hero_text' => 'Hero text',
            'hero_image' => 'Hero image URL',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
            'facebook' => 'Facebook',
            'youtube' => 'YouTube',
            'pinterest' => 'Pinterest',
        ] as $key => $label)
            <label>{{ $label }}
                @if ($key === 'hero_text')
                    <textarea name="{{ $key }}">{{ old($key, $settings[$key] ?? '') }}</textarea>
                @else
                    <input name="{{ $key }}" value="{{ old($key, $settings[$key] ?? '') }}">
                @endif
            </label>
        @endforeach
        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif
        <button class="btn btn-dark" type="submit">Save settings</button>
    </form>
@endsection
