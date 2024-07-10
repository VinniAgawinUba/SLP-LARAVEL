<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $table = 'college';
    protected $fillable = ['name', 'college_id', 'college_name'];
}
