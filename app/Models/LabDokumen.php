<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LabDokumen extends Model
{
    protected $table = 'lab_dokumen';

    protected $fillable = ['number', 'name', 'link', 'file', 'lab_id'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'lab_id');
    }
}
