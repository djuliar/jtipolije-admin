<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = ['name', 'active', 'parent_id', 'lft', 'rgt', 'depth'];
}
