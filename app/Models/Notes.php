<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $fillable = ['notes', 'lang_id', 'course_or_study_plan_id', 'topic_id'];

    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }

    public function courseOrStudyPlan()
    {
        return $this->belongsTo(CourseOrStudyPlan::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
