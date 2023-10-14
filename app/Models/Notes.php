<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $fillable = [
        'notes',
        'course_or_study_plan_id',
        'user_id',
        'lang_id',
        'topic_id'
    ];
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function courseOrStudyPlan()
    {
        return $this->belongsTo(CourseOrStudyPlan::class, 'course_or_study_plan_id');
    }
}
