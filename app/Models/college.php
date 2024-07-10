<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class college extends Model
{
    protected $table = 'college';
    protected $fillable = ['name', 'dean_id', 'logo_image'];
}
