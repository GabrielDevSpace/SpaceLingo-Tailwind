<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CourseOrStudyPlan;
use App\Models\Topic;
use App\Models\Notes;

class CourseTopicDropdowns extends Component
{
    public $courses = [];
    public $selectedCourse = null;
    public $selectedTopic;
    public $topics = [];
    public $notes = '';
    public $lang_id;

    public function render()
    {
        $user_id = auth()->id();
        $this->courses = CourseOrStudyPlan::where('user_id', $user_id)->where('lang_id', $this->lang_id)->get();
        return view('livewire.course-topic-dropdowns');
    }

    
    public function updatedSelectedCourse($courseId)
    {
        $user_id = auth()->id();
        $this->topics = Topic::where('user_id', $user_id)->where('course_or_study_plan_id', $courseId)->get();
    }

    public function fetchNotes()
    {
        $user_id = auth()->id();
        $notes = Notes::where('user_id', $user_id)
            ->where('lang_id', $this->lang_id)
            ->where('course_or_study_plan_id', $this->selectedCourse)
            ->where('topic_id', $this->selectedTopic)
            ->first();

        if ($notes) {
            $this->notes = $notes->notes;
        } else {
            $this->notes = 'Nenhum resultado encontrado.';
        }
    }
}
