<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function index(): View
    {
        $inquiries = Inquiry::query()->latest()->paginate(20);
        Inquiry::query()->whereIn('id', $inquiries->pluck('id'))->update(['is_new' => false]);

        return view('admin.inquiries.index', [
            'inquiries' => $inquiries,
        ]);
    }

    public function applications(): View
    {
        $applications = Application::query()->with('opening')->latest()->paginate(20);
        Application::query()->whereIn('id', $applications->pluck('id'))->update(['is_new' => false]);

        return view('admin.applications.index', [
            'applications' => $applications,
        ]);
    }

    public function destroy(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->delete();

        return back()->with('status', 'Inquiry removed.');
    }
}
