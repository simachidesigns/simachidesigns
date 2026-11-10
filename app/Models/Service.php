<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['type', 'title', 'slug', 'excerpt', 'body', 'sort_order'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
