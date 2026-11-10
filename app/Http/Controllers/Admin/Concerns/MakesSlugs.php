<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait MakesSlugs
{
    protected function uniqueSlug(string $table, string $title, ?string $slug, ?int $ignoreId = null): string
    {
        $base = Str::slug($slug ?: $title) ?: 'item';
        $candidate = $base;
        $suffix = 2;

        while (
            DB::table($table)
                ->where('slug', $candidate)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $candidate = $base.'-'.$suffix;
            $suffix++;
        }

        return $candidate;
    }
}
