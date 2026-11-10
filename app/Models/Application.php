<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    protected $fillable = ['opening_id', 'name', 'email', 'phone', 'message', 'is_new'];

    protected function casts(): array
    {
        return [
            'is_new' => 'boolean',
        ];
    }

    public function opening(): BelongsTo
    {
        return $this->belongsTo(Opening::class);
    }
}
