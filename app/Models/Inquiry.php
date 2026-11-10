<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'company', 'interest', 'message', 'is_new'];

    protected function casts(): array
    {
        return [
            'is_new' => 'boolean',
        ];
    }
}
