<?php

namespace App\Http\Controllers;

use App\Models\five_thousand_vocabulary;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Newregister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class JsonController extends Controller
{

    public function calculateRegistrationStats()
    {
        $today = Carbon::now()->format('Y-m-d');
    
        $firstQuestion = Question::whereDate('created_at', $today)->oldest('created_at')->first();
        $lastQuestion = Question::whereDate('created_at', $today)->latest('created_at')->first();
    
        if ($firstQuestion && $lastQuestion) {
            $registrationCount = Question::whereDate('created_at', $today)->count();
    
            $firstTime = Carbon::parse($firstQuestion->created_at);
            $lastTime = Carbon::parse($lastQuestion->created_at);
            $totalTime = $lastTime->diffInSeconds($firstTime);
    
            $timePerRegistration = $totalTime / $registrationCount;
    
            // Calcular tempo estimado para 300 registros
            $estimatedTimeFor300 = $timePerRegistration * 300;
    
            return [
                'registrationCount' => $registrationCount,
                'timePerRegistration' => gmdate('H:i:s', $timePerRegistration),
                'estimatedTimeFor300' => gmdate('H:i:s', $estimatedTimeFor300),
            ];
        }
    
        return null;
    }
    

    public function showAllWords()
    {
        $output = "";
    $words = five_thousand_vocabulary::where('variation', '')
    ->get();

    $newregisters = Newregister::join('five_thousand_vocabulary', 'newregisters.vocabulary', '=', 'five_thousand_vocabulary.word')
    ->where('newregisters.type', 'vocabulary')
    ->where('five_thousand_vocabulary.variation', '')
    ->get();

    $newregistersCounts = Newregister::join('five_thousand_vocabulary', 'newregisters.vocabulary', '=', 'five_thousand_vocabulary.word')
    ->where('newregisters.type', 'vocabulary')
    ->where('five_thousand_vocabulary.variation', '')->count();

    $complete = five_thousand_vocabulary::join('questions', 'five_thousand_vocabulary.word', '=', 'questions.word')
    ->join('answers', 'questions.id', '=', 'answers.id_questions')
    ->select('five_thousand_vocabulary.*', 'questions.*', 'answers.*')
    ->whereNot('five_thousand_vocabulary.variation', '')
    ->orderByDesc('questions.created_at')
    ->limit(5)
    ->get();

    $wordsCount = five_thousand_vocabulary::where('variation', '0')->count();
    $completeCount = five_thousand_vocabulary::whereNot('variation', '')->count();
    
    $registrationStats = $this->calculateRegistrationStats();
    if(!$registrationStats){
        $registrationStats = [
            "registrationCount"=>"0",
            "timePerRegistration"=>"0",
            "estimatedTimeFor300"=>"0",
        ];
    }
    

    return view('update')->with([
        'words' => $words,
        'complete' => $complete,
        'wordsCount' => $wordsCount,
        'completeCount' => $completeCount,
        'registrationStats' => $registrationStats,
        'newregisters' => $newregisters,
        'newregistersCounts' => $newregistersCounts,
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
        $pronunciation = $data['pronunciation'];

        // Exemplos de uso
        $useExamples = [
            $data['Usage_Example_One_English'] . ' - ' . $data['Usage_Example_One_Translation_Portuguese'],
            $data['Usage_Example_Two_English'] . ' - ' . $data['Usage_Example_Two_Translation_Portuguese'],
            $data['Usage_Example_Three_English'] . ' - ' . $data['Usage_Example_Three_Translation_Portuguese'],
        ];
        $use = implode(', ', $useExamples);

        // Variações
        $variations = [
            'variation_past' => $data['variation_past'],
            'variation_present' => $data['variation_present'],
            'variation_future' => $data['variation_future'],
        ];
        $variation = implode(', ', $variations);

        $record = five_thousand_vocabulary::where('word', $word)->first();

        if ($record) {
            $record->updateFiveThousand($translate, $use, $variation, $pronunciation);

            // Verificar se a pergunta já existe na tabela "questions"
            $existingQuestion = Question::where('word', $word)->exists();

            if (!$existingQuestion) {
                // Salvar perguntas na tabela "questions"
                $questions = new Question();
                $questions->word = $word;
                $questions->question1 = $data['question1'];
                $questions->question2 = $data['question2'];
                $questions->question3 = $data['question3'];
                $questions->save();

                // Salvar respostas na tabela "answers"
                $answers = new Answer();
                $answers->id_questions = $questions->id;
                $answers->answer1 = $data['answer1'];
                $answers->answer2 = $data['answer2'];
                $answers->answer3 = $data['answer3'];
                $answers->save();
            }
        }

            return $this->showAllWords()->with('message', 'Atualização concluída com sucesso');
        }
    
        return $this->showAllWords()->with('message', 'Atualização concluída com sucesso');
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
        $words = five_thousand_vocabulary::where('variation', '')
        ->get();
    
        $newregisters = Newregister::join('five_thousand_vocabulary', 'newregisters.vocabulary', '=', 'five_thousand_vocabulary.word')
        ->where('newregisters.type', 'vocabulary')
        ->where('five_thousand_vocabulary.variation', '')
        ->get();
    
        $newregistersCounts = Newregister::join('five_thousand_vocabulary', 'newregisters.vocabulary', '=', 'five_thousand_vocabulary.word')
        ->where('newregisters.type', 'vocabulary')
        ->where('five_thousand_vocabulary.variation', '')->count();
    
        $complete = five_thousand_vocabulary::join('questions', 'five_thousand_vocabulary.word', '=', 'questions.word')
        ->join('answers', 'questions.id', '=', 'answers.id_questions')
        ->select('five_thousand_vocabulary.*', 'questions.*', 'answers.*')
        ->whereNot('five_thousand_vocabulary.variation', '')
        ->orderByDesc('questions.created_at')
        ->limit(5)
        ->get();
    
        $wordsCount = five_thousand_vocabulary::where('variation', '0')->count();
        $completeCount = five_thousand_vocabulary::whereNot('variation', '')->count();
        
        $registrationStats = $this->calculateRegistrationStats();
        if(!$registrationStats){
            $registrationStats = [
                "registrationCount"=>"0",
                "timePerRegistration"=>"0",
                "estimatedTimeFor300"=>"0",
            ];
        }
        
    
        return view('update')->with([
            'words' => $words,
            'complete' => $complete,
            'wordsCount' => $wordsCount,
            'completeCount' => $completeCount,
            'registrationStats' => $registrationStats,
            'newregisters' => $newregisters,
            'newregistersCounts' => $newregistersCounts,
            'output' => $output
        ]);
    }
    
    
}