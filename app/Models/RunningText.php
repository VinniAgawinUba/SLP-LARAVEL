<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunningText extends Model
{
    use HasFactory;

    protected $table = 'running_texts';
    protected $fillable = ['message', 'start_date', 'end_date', 'status'];
}
