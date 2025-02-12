<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class college extends Model
{
    protected $table = 'colleges';
    protected $fillable = ['name', 'dean_id', 'logo_image'];
    public function departments()
    {
        return $this->hasMany(department::class);
    }

    public function projects()
    {
        return $this->hasMany(projects::class);
    }

    public function dean()
    {
        return $this->belongsTo(faculty::class, 'dean_id');
    }
}
