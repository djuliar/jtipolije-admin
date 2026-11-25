<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Administrasi extends Model
{
    protected $table = 'administrasi';

    protected $fillable = ['name', 'nip', 'prodi', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'telepon', 'email', 'jabatan', 'status', 'golongan', 'image', 'active', 'show_ttl', 'show_alamat', 'show_telepon', 'show_email', 'user_id', 'parent_id', 'lft', 'rgt', 'depth'];

    public function programStudi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'prodi');
    }
    //
}
