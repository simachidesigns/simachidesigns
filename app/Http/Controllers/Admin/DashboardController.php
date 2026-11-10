<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Article;
use App\Models\Inquiry;
use App\Models\Opening;
use App\Models\Project;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'counts' => [
                'projects' => Project::query()->count(),
                'articles' => Article::query()->count(),
                'openings' => Opening::query()->where('is_open', true)->count(),
                'inquiries' => Inquiry::query()->where('is_new', true)->count(),
                'applications' => Application::query()->where('is_new', true)->count(),
            ],
            'inquiries' => Inquiry::query()->latest()->limit(5)->get(),
        ]);
    }
}
