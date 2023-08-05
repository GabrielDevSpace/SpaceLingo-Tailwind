<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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
        
        $level = Exercise::where('topic', $topic)->first();
        

        // Obter a lista de tópicos a partir do banco de dados
        $topics = Exercise::distinct('topic')->pluck('topic');

        // Definir $selectedTopic como o tópico selecionado
        $selectedTopic = $topic;

        // Passar o tópico selecionado e as perguntas para a view
    return view('exercise_registration', compact('questions','level','topic', 'topics', 'selectedTopic'));
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
                'level' => $exerciseData['Level'],
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
    public function editQuestion($id)
    {
        $question = Exercise::findOrFail($id);
        return view('edit_question', compact('question'));
    }

    public function updateQuestion(Request $request, $id)
    {
        // Retrieve the question from the database using the $id
        $question = Exercise::findOrFail($id);

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'level' => 'required|string',
            'question' => 'required|string',
            'alternatives' => 'required|array',
            'answer' => 'required|string',
            'translation' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Convert the alternatives to JSON format
        $alternatives = json_encode($request->input('alternatives'));

        // Update the question with the validated data
        $question->update([
            'level' => $request->input('level'),
            'question' => $request->input('question'),
            'alternatives' => $alternatives,
            'answer' => $request->input('answer'),
            'translation' => $request->input('translation'),
            // Add other fields as needed
        ]);

        return redirect('/exercise-registration')->with('success', 'Question updated successfully!');
    }

    public function deleteQuestion($id)
    {
        $question = Exercise::findOrFail($id);
        $question->delete();

        return redirect('/exercise-registration')->with('success', 'Question deleted successfully!');
    }


    public function editTopic(Request $request)
    {
        // Get the old and new topic names from the form submission
        $oldTopic = $request->input('old_topic');
        $newTopic = $request->input('new_topic');
    
        // Update all exercises with the old topic name to the new topic name
        Exercise::where('topic', $oldTopic)->update(['topic' => $newTopic]);
    
        return redirect('/exercise-registration')->with('success', 'Topic updated successfully!');
    }


    public function deleteTopic(Request $request)
    {
        $topic = $request->input('topic');
    
        // Delete all exercises with the selected topic
        Exercise::where('topic', $topic)->delete();
    
        return redirect('/exercise-registration')->with('success', 'Topic and associated exercises deleted successfully!');
    }
}
