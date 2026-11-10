<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\MakesSlugs;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectController extends Controller
{
    use MakesSlugs;

    public function index(): View
    {
        return view('admin.projects.index', [
            'projects' => Project::query()->orderBy('sort_order')->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.projects.form', ['project' => new Project(['sort_order' => 0, 'featured' => false])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug('projects', $data['title'], $data['slug'] ?? null);
        $data['featured'] = $request->boolean('featured');

        Project::query()->create($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project published.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.form', ['project' => $project]);
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $data = $this->validated($request, $project->id);
        $data['slug'] = $this->uniqueSlug('projects', $data['title'], $data['slug'] ?? null, $project->id);
        $data['featured'] = $request->boolean('featured');

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project updated.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('status', 'Project removed.');
    }

    private function validated(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180', Rule::unique('projects', 'slug')->ignore($id)],
            'category' => ['required', Rule::in(array_keys(Project::CATEGORIES))],
            'city' => ['nullable', 'string', 'max:120'],
            'year' => ['nullable', 'integer', 'min:1990', 'max:2100'],
            'summary' => ['required', 'string', 'max:400'],
            'body' => ['required', 'string', 'max:8000'],
            'image' => ['nullable', 'url', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
        ]);
    }
}
