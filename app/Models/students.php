<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class students extends Model
{ 
    protected $table = 'students';
    protected $fillable = ['fname', 'lname', 'college_id', 'department_id', 'year_level', 'student_number', 'project_id'];
}
