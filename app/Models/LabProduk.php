<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LabProduk extends Model
{
    protected $table = 'lab_produk';

    protected $fillable = ['name', 'description', 'category_id', 'link', 'team', 'lab_id'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'lab_id');
    }
}
