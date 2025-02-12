<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['category_id', 'name', 'slug', 'description', 'image', 'meta_title', 'meta_description', 'meta_keyword', 'status'];
}
