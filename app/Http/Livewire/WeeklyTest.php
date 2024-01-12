<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Notification;
use Livewire\Component;
use App\Models\CourseOrStudyPlan;
use App\Models\Topic;
use App\Models\Notes;
use App\Models\WeeklyTest as Weekly;

class WeeklyTest extends Component
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
        // $this->courses = CourseOrStudyPlan::where('user_id', $user_id)->where('lang_id', $this->lang_id)->get();

        $this->courses = CourseOrStudyPlan::with('topics')->where('user_id', $user_id)->where('lang_id', $this->lang_id)->get();

        return view('livewire.weekly-test');
    }

    public $activeTab = 'original'; // Tab padrão
    public function showOriginal()
    {
        $this->activeTab = 'original';
    }

    public function showTranslated()
    {
        $this->activeTab = 'translated';
    }

    // Adicione as funções relacionadas aos botões de salvar conforme necessário
    public function addOriginalText()
    {
        // Lógica para salvar o texto original
    }

    public function addTranslatedText()
    {
        // Lógica para salvar o texto traduzido
    }

    public function addTestText()
    {
        // Lógica para salvar o texto do teste
    }


    /* 
    Alert Messages ajax toastr
    Types: success, error, info
    */
    public function alertMessage($type, $message)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => $type,  'message' => $message]
        );
    }

    public function addCourse()
    {
        if (!empty($this->newCourse)) {
            $user_id = auth()->id();

            // Verificar se o curso já existe para o usuário atual e o ID do idioma
            $existingCourse = CourseOrStudyPlan::where('user_id', $user_id)
                ->where('lang_id', $this->lang_id)
                ->where('name', $this->newCourse)
                ->first();

            if (!$existingCourse) {
                // Se o curso ainda não existe, adicione-o à base de dados
                CourseOrStudyPlan::create([
                    'user_id' => $user_id,
                    'lang_id' => $this->lang_id,
                    'name' => $this->newCourse,
                ]);

                $this->alertMessage('success', 'Course Added Successfully!');

                // Atualizar a lista de cursos
                $this->courses = CourseOrStudyPlan::where('user_id', $user_id)
                    ->where('lang_id', $this->lang_id)
                    ->get();
            } else {
                $this->alertMessage('error', 'Course Already Exists!');
            }
        } else {
            $this->alertMessage('error', 'Course Not Created!');
        }
    }

    public function addTopic()
    {
        if ($this->selectedCourse && !empty($this->newTopic)) {
            $user_id = auth()->id();

            // Verificar se o tópico já existe para o usuário atual e o curso selecionado
            $existingTopic = Topic::where('user_id', $user_id)
                ->where('course_or_study_plan_id', $this->selectedCourse)
                ->where('name', $this->newTopic)
                ->first();

            if (!$existingTopic) {
                // Se o tópico ainda não existe, adicione-o à base de dados
                Topic::create([
                    'user_id' => $user_id,
                    'course_or_study_plan_id' => $this->selectedCourse,
                    'name' => $this->newTopic,
                ]);
                $this->alertMessage('success', 'Topic Created Successfully!');

                // Atualizar a lista de tópicos
                $this->topics = Topic::where('user_id', $user_id)
                    ->where('course_or_study_plan_id', $this->selectedCourse)
                    ->get();
            } else {
                $this->alertMessage('error', 'Topic Already Exists.');
            }
        } else {
            $this->alertMessage('error', 'Topic Not Created.');
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
            $this->alertMessage('success', 'Notes Saved.');
        } else {
            // Caso contrário, crie um novo registro de notas
            Notes::create([
                'user_id' => $user_id,
                'lang_id' => $this->lang_id,
                'course_or_study_plan_id' => $this->selectedCourse,
                'topic_id' => $this->selectedTopic,
                'notes' => $this->notes,
            ]);
            $this->alertMessage('success', 'Notes Saved.');
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
