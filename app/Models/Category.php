<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'active', 'parent_id'];

    protected $keyType = 'int';

    public $incrementing = true;

    protected function casts(): array
    {
        return ['id' => 'integer', 'parent_id' => 'integer', 'active' => 'boolean'];
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
