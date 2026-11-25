<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherCivitas extends Model
{
    protected $table = 'other_civitas';

    protected $fillable = ['name', 'nip', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'telepon', 'email', 'jabatan', 'status', 'golongan', 'image', 'active', 'show_ttl', 'show_alamat', 'show_telepon', 'show_email', 'user_id', 'parent_id', 'lft', 'rgt', 'depth'];
}
