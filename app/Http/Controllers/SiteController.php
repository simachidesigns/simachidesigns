<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Faq;
use App\Models\Opening;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'offerings' => Service::query()->where('type', 'offering')->orderBy('sort_order')->get(),
            'segments' => Service::query()->where('type', 'segment')->orderBy('sort_order')->get(),
            'projects' => Project::query()->orderByDesc('featured')->orderBy('sort_order')->limit(5)->get(),
            'clients' => Client::query()->orderBy('sort_order')->get(),
            'articles' => Article::query()->orderByDesc('published_on')->limit(3)->get(),
            'faqs' => Faq::query()->orderBy('sort_order')->get(),
            'projectCount' => Project::query()->count(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'team' => TeamMember::query()->orderBy('sort_order')->get(),
            'segments' => Service::query()->where('type', 'segment')->orderBy('sort_order')->get(),
        ]);
    }

    public function services(): View
    {
        return view('pages.services.index', [
            'offerings' => Service::query()->where('type', 'offering')->orderBy('sort_order')->get(),
            'segments' => Service::query()->where('type', 'segment')->orderBy('sort_order')->get(),
        ]);
    }

    public function service(Service $service): View
    {
        return view('pages.services.show', [
            'service' => $service,
            'related' => Service::query()->where('type', $service->type)->whereKeyNot($service->id)->orderBy('sort_order')->get(),
            'projects' => Project::query()->when(
                $service->type === 'segment',
                fn ($query) => $query->whereIn('category', $this->categoriesFor($service->slug))
            )->orderBy('sort_order')->limit(3)->get(),
        ]);
    }

    public function projects(Request $request): View
    {
        $category = $request->string('category')->toString();
        if (! array_key_exists($category, Project::CATEGORIES)) {
            $category = '';
        }

        $projects = Project::query()
            ->when($category !== '', fn ($query) => $query->where('category', $category))
            ->orderBy('sort_order')
            ->paginate(9)
            ->withQueryString();

        return view('pages.projects.index', [
            'projects' => $projects,
            'category' => $category,
            'categories' => Project::CATEGORIES,
        ]);
    }

    public function project(Project $project): View
    {
        return view('pages.projects.show', [
            'project' => $project,
            'related' => Project::query()
                ->where('category', $project->category)
                ->whereKeyNot($project->id)
                ->orderBy('sort_order')
                ->limit(3)
                ->get(),
        ]);
    }

    public function media(): View
    {
        return view('pages.media.index', [
            'articles' => Article::query()->orderByDesc('published_on')->paginate(9),
        ]);
    }

    public function article(Article $article): View
    {
        return view('pages.media.show', [
            'article' => $article,
            'related' => Article::query()->whereKeyNot($article->id)->orderByDesc('published_on')->limit(3)->get(),
        ]);
    }

    public function careers(): View
    {
        return view('pages.careers', [
            'openings' => Opening::query()->where('is_open', true)->orderBy('department')->orderBy('title')->get(),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'offerings' => Service::query()->where('type', 'offering')->orderBy('sort_order')->get(),
        ]);
    }

    public function legal(string $page): View
    {
        abort_unless(in_array($page, ['privacy', 'terms'], true), 404);

        return view('pages.legal', ['page' => $page]);
    }

    private function categoriesFor(string $slug): array
    {
        return match ($slug) {
            'retail-solutions' => ['apparel', 'jewellery', 'lifestyle'],
            'workspace-solutions' => ['workspace', 'coworking'],
            'hospitality-solutions' => ['hospitality', 'fb'],
            default => [],
        };
    }
}
