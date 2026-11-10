<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public const CATEGORIES = [
        'apparel' => 'Apparel',
        'jewellery' => 'Jewellery',
        'hospitality' => 'Hospitality',
        'fb' => 'F&B',
        'workspace' => 'Workspace',
        'coworking' => 'Co-working',
        'lifestyle' => 'Lifestyle',
    ];

    protected $fillable = [
        'title', 'slug', 'category', 'city', 'year', 'summary', 'body',
        'image', 'featured', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
            'year' => 'integer',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function categoryLabel(): string
    {
        return self::CATEGORIES[$this->category] ?? ucfirst($this->category);
    }
}
