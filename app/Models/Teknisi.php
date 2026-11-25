<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teknisi extends Model
{
    protected $table = 'teknisi';

    protected $fillable = ['name', 'nip', 'lab', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'telepon', 'email', 'jabatan', 'status', 'golongan', 'image', 'active', 'show_ttl', 'show_alamat', 'show_telepon', 'show_email', 'user_id', 'parent_id', 'lft', 'rgt', 'depth'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'lab');
    }
}
