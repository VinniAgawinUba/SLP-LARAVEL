<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class partners extends Model
{
    protected $table = 'partners';
    protected $fillable = ['name', 'logo_image', 'address', 'contact_person', 'email', 'contact_number', 'featured', 'type_id'];
}
