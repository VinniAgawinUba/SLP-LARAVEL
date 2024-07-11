<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class faculty extends Model
{
    protected $table = 'faculties';
    protected $fillable = ['fname', 'lname', 'email', 'college_id', 'department_id', 'role', 'image'];
}
