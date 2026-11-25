<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = ['name', 'nip', 'nidn', 'prodi', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'telepon', 'email', 'jabatan', 'status', 'golongan', 'image', 'active', 'show_ttl', 'show_alamat', 'show_telepon', 'show_email', 'scholar', 'scopus', 'sinta', 'user_id', 'parent_id', 'lft', 'rgt', 'depth'];

    public function programStudi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'prodi');
    }
}
