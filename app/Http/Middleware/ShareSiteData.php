<?php

namespace App\Http\Middleware;

use App\Models\Service;
use App\Support\Site;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareSiteData
{
    public function handle(Request $request, Closure $next): Response
    {
        View::share('site', Site::bag());
        View::share('navOfferings', Service::query()->where('type', 'offering')->orderBy('sort_order')->get());
        View::share('navSegments', Service::query()->where('type', 'segment')->orderBy('sort_order')->get());

        return $next($request);
    }
};
