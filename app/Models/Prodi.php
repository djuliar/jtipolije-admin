<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prodi extends Model
{
    protected $table = 'prodi';

    protected $fillable = [
        'name', 'alias', 'description', 'coordinator', 'admin', 'profil_lulusan',
        'struktur_kurikulum', 'mata_kuliah', 'akreditasi', 'image', 'active',
        'parent_id', 'additional_info', 'ppm_cpl', 'peta_kurikulum',
    ];

    public function coordinatorDosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'coordinator');
    }

    public function adminAdministrasi(): BelongsTo
    {
        return $this->belongsTo(Administrasi::class, 'admin');
    }
}
