<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\projects;

class school_year extends Model
{
    protected $table = 'school_years';
    protected $fillable = ['school_year'];

    public function projects()
    {
        return $this->hasMany(projects::class);
    }
}
