<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['project_id', 'name'];


    public function photos()
    {
        return $this->hasMany(gallery_photos::class);
    }
}
