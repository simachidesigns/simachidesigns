<?php

namespace App\Support;

use App\Models\Setting;

class Site
{
    public const DEFAULTS = [
        'phone' => '+91 91369 17077',
        'phone_href' => '+919136917077',
        'email' => 'sales@atmosphere.work',
        'office' => 'Parel, Mumbai 400012',
        'factory' => 'Sapna Industrial Estate, Saravali, Bhiwandi, Thane 421302',
        'whatsapp' => '919136917077',
        'facebook' => 'https://www.facebook.com/atmosphere.work/',
        'youtube' => 'https://www.youtube.com/@atmospherethestoremakers',
        'linkedin' => 'https://www.linkedin.com/company/atmosphere-official/',
        'instagram' => 'https://www.instagram.com/atmosphere_thestoremakers/',
        'pinterest' => 'https://in.pinterest.com/atmosphere_thestoremakers/',
        'hero_kicker' => 'Mumbai  ·  Dubai',
        'hero_title' => 'Your partner in creating quiet masterpieces.',
        'hero_text' => 'From concept to creation — complete design and build solutions for retail, jewellery, and hospitality spaces.',
        'hero_image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=2200&q=80',
    ];

    public static function get(string $key, ?string $default = null): string
    {
        $fallback = $default ?? (self::DEFAULTS[$key] ?? '');

        return (string) (Setting::query()->where('key', $key)->value('value') ?? $fallback);
    }

    public static function bag(): array
    {
        $stored = Setting::query()->pluck('value', 'key')->all();

        return array_merge(self::DEFAULTS, array_filter($stored, fn ($value) => $value !== null && $value !== ''));
    }
};
