<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['name', 'course_or_study_plan_id'];

    public function courseOrStudyPlan()
    {
        return $this->belongsTo(CourseOrStudyPlan::class);
    }

    public function notes()
    {
        return $this->hasMany(Notes::class);
    }
}
