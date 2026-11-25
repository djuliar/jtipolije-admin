<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'template', 'name', 'title', 'slug', 'content', 'image', 'extras',
        'user_id', 'user_id_last_edit', 'active', 'meta_keyword', 'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'extras' => 'array',
        ];
    }
}
