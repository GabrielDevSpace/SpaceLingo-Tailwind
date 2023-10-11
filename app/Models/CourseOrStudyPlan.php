<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseOrStudyPlan extends Model
{
    public function lang()
    {
        return $this->belongsTo(Lang::class, 'lang_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, 'course_or_study_plan_id');
    }
}
