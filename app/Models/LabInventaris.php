<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LabInventaris extends Model
{
    protected $table = 'lab_inventaris';

    protected $fillable = ['name', 'quantity', 'condition', 'lab_id'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'lab_id');
    }
}
