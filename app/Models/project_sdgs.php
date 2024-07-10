<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project_sdgs extends Model
{
    protected $table = 'project_sdgs';
    protected $fillable = ['project_id', 'sdg'];
}
