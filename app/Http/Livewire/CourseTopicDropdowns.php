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

    public $newCourse;
    public $newTopic;

    public function render()
    {
        $user_id = auth()->id();
        $this->courses = CourseOrStudyPlan::where('user_id', $user_id)->where('lang_id', $this->lang_id)->get();
        return view('livewire.course-topic-dropdowns');
    }

    public function addCourse()
    {
        // Adicionar o novo curso à base de dados (por exemplo, usando o Eloquent)
        $user_id = auth()->id();
        CourseOrStudyPlan::create([
            'user_id' => $user_id,
            'lang_id' => $this->lang_id,
            'name' => $this->newCourse,
        ]);

        // Atualizar a lista de cursos
        $this->courses = CourseOrStudyPlan::where('user_id', $user_id)->where('lang_id', $this->lang_id)->get();
    }

    public function addTopic()
    {
        // Verificar se um curso foi selecionado
        if ($this->selectedCourse) {
            // Adicionar o novo tópico à base de dados (por exemplo, usando o Eloquent)
            $user_id = auth()->id();
            Topic::create([
                'user_id' => $user_id,
                'course_or_study_plan_id' => $this->selectedCourse,
                'name' => $this->newTopic,
            ]);

            // Atualizar a lista de tópicos
            $this->topics = Topic::where('user_id', $user_id)->where('course_or_study_plan_id', $this->selectedCourse)->get();
        }
    }

    public function saveNotes()
{
    $user_id = auth()->id();

    $existingNotes = Notes::where('user_id', $user_id)
        ->where('lang_id', $this->lang_id)
        ->where('course_or_study_plan_id', $this->selectedCourse)
        ->where('topic_id', $this->selectedTopic)
        ->first();

    if ($existingNotes) {
        // Se as notas já existirem, atualize-as
        $existingNotes->update([
            'notes' => $this->notes,
        ]);
    } else {
        // Caso contrário, crie um novo registro de notas
        Notes::create([
            'user_id' => $user_id,
            'lang_id' => $this->lang_id,
            'course_or_study_plan_id' => $this->selectedCourse,
            'topic_id' => $this->selectedTopic,
            'notes' => $this->notes,
        ]);
    }
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
