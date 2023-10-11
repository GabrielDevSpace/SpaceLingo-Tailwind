<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{

    protected $fillable = ['name', 'src_img', 'user_id'];


    public function newregisters()
    {
        return $this->hasMany(Newregister::class);
    }

    public function courseOrStudyPlans()
    {
        return $this->hasMany(CourseOrStudyPlan::class);
    }
}
