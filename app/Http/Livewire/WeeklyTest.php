<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
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
    public $original_text;
    public $lang_id;
    public $newOriginalText;
    public $newTranslationText;
    public $newTranslationTest;
    public $currentSaturday;
    public $native_language = "Portuguese - Brazil";

    public $exibirOriginal = true;
    public $exibirTranslated = false;


    public function render()
    {
        $user_id = auth()->id();

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


    public function exibirOriginal()
    {
        $this->exibirOriginal = true;
        $this->exibirTranslated = false;
    }

    public function exibirTranslated()
    {
        $this->exibirOriginal = false;
        $this->exibirTranslated = true;
    }




    public function mount()
    {
        $user_id = auth()->id();
        $startDate = $this->currentSaturday->copy()->startOfWeek();
        $endDate = $this->currentSaturday->copy()->endOfWeek();
        $token = hash('sha256', $startDate->format('Ymd') . $endDate->format('Ymd'));
        
        $existingWeeklyRegister = Weekly::where('user_id', $user_id)
            ->where('lang_id', $this->lang_id)
            ->whereBetween('token_week', [$token])
            ->first();
        if ($existingWeeklyRegister) {
            $this->newOriginalText = $existingWeeklyRegister->original;
            $this->newTranslationText = $existingWeeklyRegister->translation;
            $this->newTranslationTest = $existingWeeklyRegister->translation_test;
        }
        $this->currentSaturday = Carbon::now()->startOfWeek(Carbon::SATURDAY);
    }

    public function nextSaturday()
    {
        $this->currentSaturday->addWeek();
    }

    public function previousSaturday()
    {
        $this->currentSaturday->subWeek();
    }


    public $newTestText;

    public function copyGPT()
    {
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
        
        $user_id = auth()->id();
        $startDate = $this->currentSaturday->copy()->startOfWeek();
        $endDate = $this->currentSaturday->copy()->endOfWeek();
        $token = hash('sha256', $startDate->format('Ymd') . $endDate->format('Ymd'));

        $existingRecord = Weekly::where('user_id', $user_id)
            ->where('lang_id', $this->lang_id)
            ->first();

        if ($existingRecord) {
            $existingRecord->update([
                'original' => $this->newOriginalText,
            ]);

            $this->alertMessage('success', 'Original Text Updated Successfully!');
        } else {
            Weekly::create([
                'user_id' => $user_id,
                'lang_id' => $this->lang_id,
                'original' => $this->newOriginalText,
                'token_week' => $token,
            ]);

            $this->alertMessage('success', 'Original Text Added Successfully!');
        }
    }

    public function addTranslationText()
    {
        $this->alertMessage('success', 'Original Text Added Successfully!');
    }
}
