<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project_faculty extends Model
{
    protected $table = 'project_faculty';
    protected $fillable = ['project_id', 'faculty_id'];
}
