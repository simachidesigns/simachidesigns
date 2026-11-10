<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\Site;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings', ['settings' => Site::bag()]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'phone' => ['required', 'string', 'max:40'],
            'phone_href' => ['required', 'string', 'max:40'],
            'email' => ['required', 'email', 'max:160'],
            'office' => ['required', 'string', 'max:240'],
            'factory' => ['required', 'string', 'max:240'],
            'whatsapp' => ['required', 'string', 'max:30'],
            'facebook' => ['nullable', 'url', 'max:240'],
            'youtube' => ['nullable', 'url', 'max:240'],
            'linkedin' => ['nullable', 'url', 'max:240'],
            'instagram' => ['nullable', 'url', 'max:240'],
            'pinterest' => ['nullable', 'url', 'max:240'],
            'hero_kicker' => ['required', 'string', 'max:80'],
            'hero_title' => ['required', 'string', 'max:180'],
            'hero_text' => ['required', 'string', 'max:400'],
            'hero_image' => ['required', 'url', 'max:500'],
        ]);

        foreach ($data as $key => $value) {
            Setting::put($key, $value);
        }

        return back()->with('status', 'Studio settings saved.');
    }
}
