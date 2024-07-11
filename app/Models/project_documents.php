<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_documents extends Model
{
    protected $table = 'project_documents';
    protected $fillable = ['project_id', 'file_name', 'file_type', 'file_size', 'file_path'];
    public $timestamps = false;
}
