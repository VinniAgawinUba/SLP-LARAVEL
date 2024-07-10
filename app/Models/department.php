<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $table = 'deparment';
    protected $fillable = ['name', 'college_id', 'college_name'];

    public function college()
    {
        return $this->belongsTo(college::class);
    }

    public function projects()
    {
        return $this->hasMany(projects::class);
    }
}
