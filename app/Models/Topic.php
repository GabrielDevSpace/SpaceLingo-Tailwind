<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function courseOrStudyPlan()
    {
        return $this->belongsTo(CourseOrStudyPlan::class, 'course_or_study_plan_id');
    }

    public function notes()
    {
        return $this->hasMany(Notes::class, 'topic_id');
    }
}