<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LabKegiatan extends Model
{
    protected $table = 'lab_kegiatan';

    protected $fillable = ['name', 'description', 'date', 'image', 'lab_id'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'lab_id');
    }
}
