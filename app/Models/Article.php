<?php

namespace App\Models;

use App\Enums\ArticleActive;
use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = 'articles';

    protected $keyType = 'int';

    public $incrementing = true;

    protected $fillable = [
        'title', 'slug', 'content', 'category_id', 'image', 'user_id', 'editable',
        'meta_description', 'meta_author', 'meta_keyword', 'og_image', 'og_title',
        'og_description', 'featured', 'status', 'active', 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tag')
            ->withTimestamps()
            ->wherePivotNull('deleted_at');
    }

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
            'status' => ArticleStatus::class,
            'active' => ArticleActive::class,
            'id' => 'integer',
            'category_id' => 'integer',
        ];
    }
}
