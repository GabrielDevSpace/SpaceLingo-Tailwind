<?php

namespace App\Http\Controllers;

use App\Models\FiveThousandVersionTwo;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Newregister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class JsonV2Controller extends Controller
{


    public function showAllWords()
    {
        $output = "";
        //$words = FiveThousandVersionTwo::whereNull('use_one')
        $words = FiveThousandVersionTwo::whereNull('translate')
            ->get();

        //$complete = FiveThousandVersionTwo::whereNotNull('use_one')
            //->orderByDesc('created_at')
            $complete = FiveThousandVersionTwo::whereNotNull('translate')
            ->orderByDesc('updated_at')
            ->limit(100)
            ->get();

        $wordsCount = FiveThousandVersionTwo::where('translate', null)->count();
        $completeCount = FiveThousandVersionTwo::whereNot('translate', null)->count();

        // $wordsCount = FiveThousandVersionTwo::where('use_one', null)->count();
        // $completeCount = FiveThousandVersionTwo::whereNot('use_one', null)->count();


        return view('ftv_v2_update')->with([
            'words' => $words,
            'complete' => $complete,
            'wordsCount' => $wordsCount,
            'completeCount' => $completeCount,
            'wordsCount' => $wordsCount,
            'completeCount' => $completeCount,
            'output' => $output
        ]);
    }

    public function updateFromJson(Request $request)
    {
        $json = $request->input('json');
        $data = json_decode($json, true);

        if (is_array($data) && isset($data['word'])) {
            $word = $data['word'];
            $translate = $data['translate'];
            //$use_two = $data['use_two'];
            //$use_three = $data['use_three'];
            //$translate_one = $data['translate_one'];
            //$translate_two = $data['translate_two'];
            //$translate_three = $data['translate_three'];

            $record = FiveThousandVersionTwo::where('word', $word)->first();
            //$record->updateFiveThousandVersiontwo($use_one, $use_two, $use_three, $translate_one, $translate_two, $translate_three);
            $record->updateFiveThousandVersiontwo($translate);

            return $this->showAllWords()->with('message', 'Atualização concluída com sucesso');
        }

        return $this->showAllWords()->with('message', 'Erro ao atualizar!');
    }


    public function generateChat(Request $request)
    {
        $input = $request->input('textarea-input');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . config('services.openai.api_key'),
        ])->withOptions([
            'verify' => false,
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ["role" => "user", "content" => $input]
            ],
            'temperature' => 0.7,
            //'max_tokens' => 150,
        ])->throw()->json();

        $output = $response['choices'][0]['message']['content'];
            //$words = FiveThousandVersionTwo::whereNull('use_one')->get();
            $words = FiveThousandVersionTwo::whereNull('translate')
            ->get();

            //$complete = FiveThousandVersionTwo::whereNotNull('use_one')
            $complete = FiveThousandVersionTwo::whereNotNull('translate')
            //->orderByDesc('created_at')
            ->orderByDesc('updated_at')
            ->limit(100)
            ->get();

            //$wordsCount = FiveThousandVersionTwo::where('use_one', null)->count();
            //$completeCount = FiveThousandVersionTwo::whereNot('use_one', null)->count();
            $wordsCount = FiveThousandVersionTwo::where('translate', null)->count();
            $completeCount = FiveThousandVersionTwo::whereNot('translate', null)->count();
    
            return view('ftv_v2_update')->with([
                'words' => $words,
                'complete' => $complete,
                'wordsCount' => $wordsCount,
                'completeCount' => $completeCount,
                'wordsCount' => $wordsCount,
                'completeCount' => $completeCount,
                'output' => $output
            ]);
        }

}
