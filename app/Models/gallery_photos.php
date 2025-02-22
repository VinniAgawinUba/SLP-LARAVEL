<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class gallery_photos extends Model
{
    protected $table = 'gallery_photos';
    protected $fillable = ['gallery_id', 'project_id', 'file_name'];

    public function gallery()
    {
        return $this->belongsTo(gallery::class);
    }

}
