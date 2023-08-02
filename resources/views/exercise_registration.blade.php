<!DOCTYPE html>
<html>
<head>
    <title>Exercise Registration</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">

<h1>Exercise Registration</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @elseif (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <div class="container mx-auto mt-4 flex">
        <!-- Barra lateral esquerda - Lista de Tópicos -->
        <div class="w-1/4 p-4 bg-white">
            <h3 class="mb-2 text-lg font-semibold">Topics</h3>
            <ul>
                @foreach ($topics as $topic)
                    <li class="mb-2">
                        <a href="{{ route('showTopic', ['topic' => $topic]) }}" class="text-blue-600 hover:text-blue-800">{{ $topic }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Exibição das Questões -->
<h3 class="mb-4 text-lg font-semibold">Questions</h3>
<div id="question-details">
    @if ($selectedTopic)
        @foreach ($questions as $question)
            <div class="mb-4 p-4 border border-gray-300">
                <h4 class="mb-2 font-semibold">{{ $question->question }}</h4>
                <ul class="mb-2">
                    @foreach (json_decode($question->alternatives, true) as $alternative)
                        <li class="{{ $question->answer === $alternative ? 'text-green-500 font-semibold' : '' }}">{{ $alternative }}</li>
                    @endforeach
                </ul>
                <p class="text-sm text-gray-500" title="{{ $question->translation }}">Translation: {{ $question->translation }}</p>
            </div>
        @endforeach
    @else
        <p>Select a topic to display questions.</p>
    @endif
</div>

    <!-- Formulário para adicionar exercício -->
    <div class="container mx-auto mt-4">
        <div class="bg-white p-4">
            <h3 class="mb-4 text-lg font-semibold">Add Exercise</h3>
            <form action="{{ route('storeExercise') }}" method="post">
                @csrf
                <label for="json_data">Paste the exercise JSON here:</label>
                <br>
                <textarea name="json_data" rows="10" cols="50">
                {
  "Topic": "Verb To Be",
  "Description": "Past Simple (Passado Simples)",
  "Question": "______ they at the party last night?",
  "alternatives": {
    "alternative_I": "Am",
    "alternative_II": "Was",
    "alternative_III": "Were"
  },
  "answer": "Were",
  "translation": "Eles estavam na festa ontem à noite?"
}

                </textarea>
                <br>
                <button type="submit">Save Exercise</button>
            </form>
        </div>
    </div>
</body>
</html>
