<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keyword', 'navbar_status', 'status'];
}
