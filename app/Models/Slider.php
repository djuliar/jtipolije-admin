<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $fillable = ['title', 'description', 'image', 'image_position', 'button_text', 'button_link', 'target', 'active', 'parent_id', 'lft', 'rgt', 'depth'];
}
