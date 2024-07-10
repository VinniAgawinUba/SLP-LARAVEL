<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class college extends Model
{
    protected $table = 'college';
    protected $fillable = ['name', 'dean_id', 'logo_image'];
    public function departments()
    {
        return $this->hasMany(department::class);
    }

    public function projects()
    {
        return $this->hasMany(projects::class);
    }
}
