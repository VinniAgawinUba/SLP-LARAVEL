<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    protected $table = 'articles';
    protected $fillable = ['project_id', 'thumb_nail_pic', 'thumb_nail_summary', 'content', 'published_date', 'featured'];
}
