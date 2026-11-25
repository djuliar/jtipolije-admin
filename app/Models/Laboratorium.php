<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laboratorium extends Model
{
    protected $table = 'laboratorium';

    protected $fillable = ['name', 'alias', 'description', 'chairman', 'image', 'phone', 'email', 'website', 'address', 'additional', 'active'];

    protected function casts(): array
    {
        return ['additional' => 'array'];
    }

    public function chairmanLab(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'chairman');
    }
}
