<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\MakesSlugs;
use App\Http\Controllers\Controller;
use App\Models\Opening;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class OpeningController extends Controller
{
    use MakesSlugs;

    public function index(): View
    {
        return view('admin.openings.index', [
            'openings' => Opening::query()->orderBy('department')->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.openings.form', ['opening' => new Opening(['is_open' => true])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug('openings', $data['title'], $data['slug'] ?? null);
        $data['is_open'] = $request->boolean('is_open');
        Opening::query()->create($data);

        return redirect()->route('admin.openings.index')->with('status', 'Role posted.');
    }

    public function edit(Opening $opening): View
    {
        return view('admin.openings.form', ['opening' => $opening]);
    }

    public function update(Request $request, Opening $opening): RedirectResponse
    {
        $data = $this->validated($request, $opening->id);
        $data['slug'] = $this->uniqueSlug('openings', $data['title'], $data['slug'] ?? null, $opening->id);
        $data['is_open'] = $request->boolean('is_open');
        $opening->update($data);

        return redirect()->route('admin.openings.index')->with('status', 'Role updated.');
    }

    public function destroy(Opening $opening): RedirectResponse
    {
        $opening->delete();

        return redirect()->route('admin.openings.index')->with('status', 'Role removed.');
    }

    private function validated(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180', Rule::unique('openings', 'slug')->ignore($id)],
            'department' => ['required', 'string', 'max:120'],
            'summary' => ['required', 'string', 'max:400'],
            'responsibilities' => ['required', 'string', 'max:8000'],
            'qualifications' => ['required', 'string', 'max:4000'],
        ]);
    }
}
