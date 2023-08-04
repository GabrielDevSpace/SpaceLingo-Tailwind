<!DOCTYPE html>
<html>

<head>
    <title>Exercise Registration</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-blue-600 py-4">
        <div class="container mx-auto px-4">
            <a href="#" class="text-white font-semibold text-lg">Exercise Registration</a>
        </div>
    </nav>

    <div class="container mx-auto m-8 p-2 border-1 border-gray-300 rounded-lg flex-grow bg-gray-200 ">
        <!-- Formulário para adicionar exercício -->
        <div class="bg-white p-4 rounded-lg border-2 border-gray-300">
            <h3 class="mb-4 text-lg font-semibold">Add Exercise</h3>
            <!-- Display success message -->
            @if (session('success'))
            <p style="color: green">{{ session('success') }}</p>
            @endif

            <!-- Display error message -->
            @if (session('error'))
            <p style="color: red">{{ session('error') }}</p>
            @endif

            <form action="{{ route('storeExercise') }}" method="post">
                @csrf
                <label for="json_data">Paste the exercise JSON here:</label>
                <br>
                <textarea name="json_data" rows="13" class="w-full">
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
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Save Exercise</button>
            </form>
        </div>

        <div class="container mx-auto mt-4 flex">
            <!-- Barra lateral esquerda - Lista de Tópicos -->
            <div class="w-1/4 p-4 bg-white rounded-l-lg border-l-2 border-t-2 border-b-2 border-gray-300">
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
            <div class="w-3/4 p-4 bg-white border-r-2 border-t-2 border-b-2 border-gray-300 rounded-r-lg">
    <h3 class="mb-4 text-lg font-semibold">Questions</h3>
    <div id="question-details">
        @if ($selectedTopic)
        @foreach ($questions as $question)
        <div class="mb-4 p-4 border border-gray-200 bg-gray-200 rounded-md">
            <h4 class="mb-2 font-semibold">{{ $question->question }}</h4>
            <ul class="mb-2">
                @foreach (json_decode($question->alternatives, true) as $alternative)
                <li class="{{ $question->answer === $alternative ? 'text-green-500 font-semibold' : '' }}">{{ $alternative }}</li>
                @endforeach
            </ul>
            <p class="text-sm text-gray-500" title="{{ $question->translation }}">Translation: {{ $question->translation }}</p>
        </div>
        @endforeach
        <!-- Display pagination links -->
        {{ $questions->links() }}
        @else
        <p>Select a topic to display questions.</p>
        @endif
    </div>
</div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 py-4">
        <div class="container mx-auto px-4 text-white text-center">
            <p>Exercise Registration &copy; {{ date('Y') }}</p>
        </div>
    </footer>

</body>

</html>