<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LabGaris extends Model
{
    protected $table = 'lab_garis';

    protected $fillable = ['name', 'leader', 'team', 'description', 'lab_id'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'lab_id');
    }

    public function leaderDosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'leader');
    }
}
