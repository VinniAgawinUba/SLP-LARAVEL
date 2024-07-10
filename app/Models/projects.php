<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    protected $table = 'projects';
    protected $fillable = ['name', 'description', 'type', 'subject_hosted', 'college_id', 'department_id', 'sd_coordinator_id', 'partner_id', 'school_year_id', 'semester', 'status', 'featured'];

    public function schoolYear()
    {
        return $this->belongsTo(school_year::class);
    }

    public function college()
    {
        return $this->belongsTo(college::class);
    }

    public function department()
    {
        return $this->belongsTo(department::class);
    }
}
