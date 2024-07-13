<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class projects extends Model
{
    protected $table = 'projects';
    protected $fillable = ['name', 'description', 'type', 'subject_hosted', 'number_of_students', 'college_id', 'department_id', 'sd_coordinator_id', 'partner_id', 'school_year_id', 'semester', 'status', 'featured'];

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

    public function partner()
    {
        return $this->belongsTo(partners::class);
    }

    public function faculties(): BelongsToMany
    {
        return $this->belongsToMany(faculty::class, 'project_faculty', 'project_id', 'faculty_id');
    }

      public function projectDocuments(): HasMany
    {
        return $this->hasMany(project_documents::class, 'project_id');
    }

    public function projectSdgs(): HasMany
    {
        return $this->hasMany(project_sdgs::class, 'project_id');
    }
}
