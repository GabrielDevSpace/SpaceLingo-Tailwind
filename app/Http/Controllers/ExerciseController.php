<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    public function showForm()
    {
        return view('exercise_registration');
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
