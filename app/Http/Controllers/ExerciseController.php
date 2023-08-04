<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Exercise;

class ExerciseController extends Controller
{

    public function showForm()
    {
        // Obter a lista de tópicos a partir do banco de dados
        $topics = Exercise::distinct('topic')->pluck('topic');

        // Definir $selectedTopic como nulo (ou algum valor padrão, se desejar)
        $selectedTopic = null;

        return view('exercise_registration', compact('topics', 'selectedTopic'));
    }

   
public function showTopic($topic)
{
    // Set the number of items per page (you can adjust this as needed)
    $perPage = 10;

    // Obtain the paginated questions for the selected topic using Eloquent
    $questions = Exercise::where('topic', $topic)->paginate($perPage);

    // Obter a lista de tópicos a partir do banco de dados
    $topics = Exercise::distinct('topic')->pluck('topic');

    // Definir $selectedTopic como o tópico selecionado
    $selectedTopic = $topic;

    // Passar o tópico selecionado e as perguntas para a view
    return view('exercise_registration', compact('questions', 'topic', 'topics', 'selectedTopic'));
}

    public function store(Request $request)
    {
        $json = $request->input('json_data');
        $exerciseData = json_decode($json, true);

        if ($exerciseData) {
            // Verificar se o exercício já existe no banco de dados
            $existingExercise = Exercise::where('description', $exerciseData['Description'])
                ->where('alternatives', json_encode($exerciseData['alternatives']))
                ->first();

            if ($existingExercise) {
                return redirect('/exercise-registration')->with('error', 'Exercise already exists in the database.');
            }

            $exercise = new Exercise([
                'topic' => $exerciseData['Topic'],
                'description' => $exerciseData['Description'],
                'question' => $exerciseData['Question'],
                'alternatives' => json_encode($exerciseData['alternatives']),
                'answer' => $exerciseData['answer'],
                'translation' => $exerciseData['translation'] ?? null, // Inclua a tradução, se estiver presente no JSON
            ]);

            $exercise->save();

            return redirect('/exercise-registration')->with('success', 'Exercise successfully registered!');
        } else {
            return redirect('/exercise-registration')->with('error', 'Invalid JSON format. Please check and try again.');
        }
    }
}
