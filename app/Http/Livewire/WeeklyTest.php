<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Notification;
use Livewire\Component;
use App\Models\CourseOrStudyPlan;
use App\Models\Topic;
use App\Models\Lang;
use App\Models\Newregister;
use App\Models\WeeklyTest as Weekly;
use Carbon\Carbon;

class WeeklyTest extends Component
{

    public $vocabulary = [];
    public $lang_id;
    public $newCourse;
    public $native_language = "Portuguese - Brazil";



    public function render()
    {
        $user_id = auth()->id();

        // Filtre com base na data do sábado atual
        //$startDate = $this->currentSaturday->copy()->startOfWeek();
       //$endDate = $this->currentSaturday->copy()->endOfWeek();

        $startDate = $this->currentSaturday->copy()->startOfWeek();
        $endDate = $this->currentSaturday->copy()->endOfWeek();

        $lang = Lang::where('id', $this->lang_id)
            ->where('user_id', $user_id)
            ->value('name');

        $this->vocabulary = Newregister::where('lang_id', '=', $this->lang_id)
            ->where('user_id', '=', $user_id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $startDate = $startDate->format('d/m/Y');
        $endDate = $endDate->format('d/m/Y');

        return view('livewire.weekly-test', compact('startDate', 'endDate', 'lang'));
    }

 

    public $currentSaturday;

    public function mount()
    {
        // Inicialize com o sábado atual
        $this->currentSaturday = Carbon::now()->startOfWeek(Carbon::SATURDAY);
    }

    public function nextSaturday()
    {
        // Avança para o próximo sábado
        $this->currentSaturday->addWeek();
    }

    public function previousSaturday()
    {
        // Retrocede para o sábado anterior
        $this->currentSaturday->subWeek();
    }


    public $newTestText;

    public function copyGPT()
    {
        // Your existing logic to save the test text

        // Now, let's add the logic to copy the textarea content
        $this->dispatchBrowserEvent('copyGPT', ['text' => $this->copyGPT]);
    }

    public function alertMessage($type, $message)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => $type,  'message' => $message]
        );
    }

    public function addOriginalText()
    {
        //$this->alertMessage('success', 'Original Text Added Successfully!');
    }

    public function addTranslatedText()
    {
    }
}
