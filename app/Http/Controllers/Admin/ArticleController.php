<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\MakesSlugs;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ArticleController extends Controller
{
    use MakesSlugs;

    public function index(): View
    {
        return view('admin.articles.index', [
            'articles' => Article::query()->orderByDesc('published_on')->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.articles.form', ['article' => new Article(['published_on' => now()->toDateString()])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug('articles', $data['title'], $data['slug'] ?? null);
        Article::query()->create($data);

        return redirect()->route('admin.articles.index')->with('status', 'Story published.');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.form', ['article' => $article]);
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $data = $this->validated($request, $article->id);
        $data['slug'] = $this->uniqueSlug('articles', $data['title'], $data['slug'] ?? null, $article->id);
        $article->update($data);

        return redirect()->route('admin.articles.index')->with('status', 'Story updated.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('admin.articles.index')->with('status', 'Story removed.');
    }

    private function validated(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200', Rule::unique('articles', 'slug')->ignore($id)],
            'excerpt' => ['required', 'string', 'max:400'],
            'body' => ['required', 'string', 'max:12000'],
            'image' => ['nullable', 'url', 'max:500'],
            'published_on' => ['required', 'date'],
        ]);
    }
}
