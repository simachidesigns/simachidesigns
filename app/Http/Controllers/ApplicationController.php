<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Opening;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'opening_id' => ['nullable', 'exists:openings,id'],
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:40'],
            'message' => ['nullable', 'string', 'max:4000'],
        ]);

        if (! empty($data['opening_id']) && ! Opening::query()->whereKey($data['opening_id'])->where('is_open', true)->exists()) {
            return back()->withErrors(['opening_id' => 'That role is no longer open.'])->withInput();
        }

        Application::query()->create($data);

        return back()->with('status', 'Application received. We read every note.');
    }
}
