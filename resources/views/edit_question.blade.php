<!DOCTYPE html>
<html>

<head>
    <title>Edit Question</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-blue-600 py-4">
        <div class="container mx-auto px-4">
            <a href="#" class="text-white font-semibold text-lg">Edit Question</a>
        </div>
    </nav>

    <div class="container mx-auto m-8 p-2 border-1 border-gray-300 rounded-lg flex-grow bg-gray-200">
        <!-- Formulário para editar a questão -->
        <div class="bg-white p-4 rounded-lg border-2 border-gray-300">
            <h3 class="mb-4 text-lg font-semibold">Edit Question</h3>
            <form action="{{ route('updateQuestion', ['id' => $question->id]) }}" method="post">
                @csrf
                @method('PUT')
                <!-- Display existing question details for editing -->
                <div class="mb-4 p-4 border border-gray-200 bg-gray-200 rounded-md">
                    <label for="question">Question:</label>
                    <input type="text" name="question" id="question" value="{{ $question->question }}" class="w-full px-4 py-2 rounded-md border-gray-300">
                </div>
                <div class="mb-4 p-4 border border-gray-200 bg-gray-200 rounded-md">
                    <label for="alternatives">Alternatives:</label><br>
                    @php
                    $decodedAlternatives = json_decode($question->alternatives, true);
                    @endphp
                    @foreach ($decodedAlternatives as $key => $alternative)
                    <label for="{{ $key }}">{{ $key }}:</label>
                    <input type="text" name="alternatives[{{ $key }}]" id="{{ $key }}" value="{{ $alternative }}" class="w-50 px-4 py-2  my-2 rounded-md border-gray-300">
                    <br>
                    @endforeach
                </div>
                <div class="mb-4 p-4 border border-gray-200 bg-gray-200 rounded-md">
                    <label for="answer">Answer:</label>
                    <input type="text" name="answer" id="answer" value="{{ $question->answer }}" class="w-full px-4 py-2 rounded-md border-gray-300">
                </div>
                <div class="mb-4 p-4 border border-gray-200 bg-gray-200 rounded-md">
                    <label for="translation">Translation:</label>
                    <input type="text" name="translation" id="translation" value="{{ $question->translation }}" class="w-full px-4 py-2 rounded-md border-gray-300">
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update Question</button>
            </form>
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