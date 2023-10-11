<?php
// app/Http/Livewire/CombinedComponent.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lang;
use App\Models\CourseOrStudyPlan;
use App\Models\Topic;
use App\Models\Notes;

class CombinedComponent extends Component
{
    public $selectedLangId;
    public $selectedCourseOrStudyPlanId;
    public $selectedTopicId;
    public $langs;
    public $courseOrStudyPlans;
    public $topics;
    public $notes;

    public function render()
    {
        $this->langs = Lang::all();
        return view('livewire.combined-component');
    }

    public function selectLang($langId)
    {
        $this->selectedLangId = $langId;
        $this->selectedCourseOrStudyPlanId = null;
        $this->selectedTopicId = null;
        $this->courseOrStudyPlans = CourseOrStudyPlan::where('lang_id', $langId)->get();
        $this->topics = [];
        $this->notes = [];
    }

    public function selectCourseOrStudyPlan($courseOrStudyPlanId)
    {
        $this->selectedCourseOrStudyPlanId = $courseOrStudyPlanId;
        $this->selectedTopicId = null;
        $this->topics = Topic::where('course_or_study_plan_id', $courseOrStudyPlanId)->get();
        $this->notes = [];
    }

    public function selectTopic($topicId)
    {
        $this->selectedTopicId = $topicId;
        $this->notes = Notes::where('topic_id', $topicId)->get();
    }
}
