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
    public $copiedText;
    public $chatGPT;
    public $newOriginalText;
    public $newTranslationText;
    public $newTranslationTest;
    public $currentSaturday;
    public $native_language = "Portuguese - Brazil";
    public $token;
    public $exibirOriginal = true;
    public $exibirTranslated = false;


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

    public function nextSaturday()
    {
        $this->currentSaturday->addWeek();
    }

    public function previousSaturday()
    {
        $this->currentSaturday->subWeek();
    }

    public function copyGPT()
    {
        $this->emit('copiado', $this->chatGPT);

        $this->alertMessage('success', 'Text copied to clipboard!');
    }


    public function alertMessage($type, $message)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => $type,  'message' => $message]
        );
    }
    private function calculateDateRangeAndToken()
    {
        $startDate = $this->currentSaturday->copy()->startOfWeek();
        $endDate = $this->currentSaturday->copy()->endOfWeek();
        $token = hash('sha256', $startDate->format('Ymd') . $endDate->format('Ymd'));

        return [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'token' => $token,
        ];
    }

    private function loadWeeklyRegister()
    {
        $user_id = auth()->id();
        $dateRangeAndToken = $this->calculateDateRangeAndToken();

        return Weekly::where('user_id', $user_id)
            ->where('lang_id', $this->lang_id)
            ->where('token_week', $dateRangeAndToken['token'])
            ->first();
    }

    public function render()
    {
        $user_id = auth()->id();
        $dateRangeAndToken = $this->calculateDateRangeAndToken();

        $lang = Lang::where('id', $this->lang_id)
            ->where('user_id', $user_id)
            ->value('name');

        $this->vocabulary = Newregister::where('lang_id', '=', $this->lang_id)
            ->where('user_id', '=', $user_id)
            ->whereBetween('created_at', [$dateRangeAndToken['startDate'], $dateRangeAndToken['endDate']])
            ->get();

        $vocabularyList = $this->vocabulary->pluck('vocabulary')->toArray();

        $this->chatGPT = "Generate a text in the language $lang with the words below:
                WORDS = [" . implode(',', array_map(fn ($word) => "\"$word\"", $vocabularyList)) . "]
            
                And also return the translation of this text in the language \"$this->native_language\" Highlight words with the <u></u> tag
            
                Detail: if the word is not recognized, just ignore it.";

        $existingWeeklyRegister = $this->loadWeeklyRegister();

        if ($existingWeeklyRegister) {
            $this->newOriginalText = $existingWeeklyRegister->original;
            $this->newTranslationText = $existingWeeklyRegister->translation;
            $this->newTranslationTest = $existingWeeklyRegister->translation_test;
        } else {
            $this->newOriginalText = "";
            $this->newTranslationText = "";
            $this->newTranslationTest = "";
        }

        return view('livewire.weekly-test', [
            'startDate' => $dateRangeAndToken['startDate']->format('d/m/Y'),
            'endDate' => $dateRangeAndToken['endDate']->format('d/m/Y'),
            'lang' => $lang,
        ]);
    }

    public function mount()
    {
        $this->currentSaturday = Carbon::now()->startOfWeek(Carbon::SATURDAY);
    }

    private function saveTextToWeeklyRegister($field, $value)
    {
        $user_id = auth()->id();
        $dateRangeAndToken = $this->calculateDateRangeAndToken();

        $existingRecord = $this->loadWeeklyRegister();

        if ($existingRecord) {
            $existingRecord->update([$field => $value]);
            $this->alertMessage('success', ucfirst($field) . ' Updated Successfully!');
        } else {
            Weekly::create([
                'user_id' => $user_id,
                'lang_id' => $this->lang_id,
                $field => $value,
                'token_week' => $dateRangeAndToken['token'],
            ]);

            $this->alertMessage('success', ucfirst($field) . ' Added Successfully!');
        }
    }

    public function addOriginalText()
    {
        $this->saveTextToWeeklyRegister('original', $this->newOriginalText);
    }

    public function addTranslationText()
    {
        $this->saveTextToWeeklyRegister('translation', $this->newTranslationText);
    }

    public function addTranslationTest()
    {
        $this->saveTextToWeeklyRegister('translation_test', $this->newTranslationTest);
    }
}
