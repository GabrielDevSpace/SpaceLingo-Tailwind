<?php

namespace App\Http\Controllers;

use App\Models\five_thousand_vocabulary;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Newregister;
use Illuminate\Http\Request;
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
        'newregistersCounts' => $newregistersCounts
    ]);
    }

    public function updateFromJson(Request $request)
    {
        $json = $request->input('json');
        $data = json_decode($json, true);
    
        if (is_array($data)) {
            foreach ($data as $item) {
                if (isset($item['word']) && is_string($item['word'])) {
                    $word = $item['word'];
                    $translate = $item['translate'];
                    $use = $item['use'];
                    $variation = $item['variation'];
                    $pronunciation = $item['pronunciation'];
    
                    $record = five_thousand_vocabulary::where('word', $word)->first();
    
                    if ($record) {
                        $record->updateFiveThousand(
                            implode(', ', (array)$translate),
                            implode(', ', (array)$use),
                            implode(', ', (array)$variation),
                            (string)$pronunciation
                        );
    
                        // Verificar se a pergunta já existe na tabela "questions"
                        $existingQuestion = Question::where('word', $word)->exists();
    
                        if (!$existingQuestion) {
                            // Salvar perguntas na tabela "questions"
                            $questions = new Question();
                            $questions->word = $word;
                            $questions->question1 = $item['questions'][0]['question'] ?? '';
                            $questions->question2 = $item['questions'][1]['question'] ?? '';
                            $questions->question3 = $item['questions'][2]['question'] ?? '';
                            $questions->save();
    
                            // Salvar respostas na tabela "answers"
                            $answers = new Answer();
                            $answers->id_questions = $questions->id;
                            $answers->answer1 = $item['questions'][0]['answer'] ?? '';
                            $answers->answer2 = $item['questions'][1]['answer'] ?? '';
                            $answers->answer3 = $item['questions'][2]['answer'] ?? '';
                            $answers->save();
                        }
                    }
                } else {
                    \Log::error('Palavra inválida: ' . $json);
                }
            }
    
            return redirect()->back()->with('message', 'Atualização concluída com sucesso');
        }
    
        return redirect()->back()->with('message', 'Erro: JSON inválido');
    }
    
    
}