<!DOCTYPE html>
<html>

<head>
    <title>Exercise Registration</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                        "Level": "Basic",
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
                        <i class="fas fa-edit text-blue-600 cursor-pointer" title="Edit" onclick="editTopic('{{ $topic }}')"></i>
                        <i class="fas fa-trash text-red-600 cursor-pointer ml-2" title="Delete" onclick="confirmDeleteTopic('{{ $topic }}')"></i>
                        <span class="text-blue-600 hover:text-blue-800"><a href="{{ route('showTopic', ['topic' => $topic]) }}" class="text-blue-600 hover:text-blue-800">{{ $topic }}</a></span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div id="edit-topic-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-4 rounded-lg border-2 border-gray-300">
                    <h3 class="mb-4 text-lg font-semibold">Edit Topic</h3>
                    <form id="edit-topic-form" action="{{ route('editTopic') }}" method="post">
                        @csrf
                        <input type="hidden" name="old_topic" id="old_topic">
                        <label for="new_topic">New Topic Name:</label>
                        <br>
                        <input type="text" name="new_topic" id="new_topic" class="w-full px-4 py-2 rounded-md border-gray-300 text-blue-500" required>
                        <br>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mt-4">Save Changes</button>
                    </form>
                </div>
            </div>

            <!-- Exibição das Questões -->
            <div class="w-3/4 p-4 bg-white border-r-2 border-t-2 border-b-2 border-gray-300 rounded-r-lg">

                <div id="question-details">
                    @if ($selectedTopic)
                    <h3 class="pb-5">Questions:
                        <b>
                            {{ $level['level'] }} - {{ $level['topic'] }}
                        </b>
                    </h3>
                    @foreach ($questions as $question)

                    <div class="mb-4 p-4 border border-gray-200 bg-gray-200 rounded-md">
                        <h4 class="mb-2 font-semibold">
                            <b class="text-sm text-gray-500">
                                <i class="fas fa-info-circle text-yellow-500 hover:text-yellow-600 text-base" title="{{ $question->translation }}"></i>
                            </b>
                            {{ $question->question }}
                        </h4>
                        <ul class="mb-2 ml-5">
                            @foreach (json_decode($question->alternatives, true) as $key => $alternative)
                            <li class="{{ $question->answer === $alternative ? 'text-green-500 font-semibold' : '' }}">
                                {{ $loop->iteration }}.
                                @if ($question->answer === $alternative)

                                @endif
                                {{ $alternative }}
                            </li>
                            @endforeach
                        </ul>
                        <div class="text-right">
                            <!-- Edit button -->
                            <a href="{{ route('editQuestion', ['id' => $question->id]) }}" class="inline-block mt-1 px-1 py-1 text-sm font-bold text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white">Edit</a>
                            <!-- Delete button -->
                            <form action="{{ route('deleteQuestion', ['id' => $question->id]) }}" method="post" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this question?');" class="inline-block mt-1 px-1 py-1 text-sm font-bold text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white">Delete</button>
                            </form>
                        </div>
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
    <script>
        // Function to open the Edit Topic Modal
        function editTopic(topic) {
            document.getElementById('old_topic').value = topic;
            document.getElementById('new_topic').value = topic;
            document.getElementById('edit-topic-modal').classList.remove('hidden');
        }

        // Function to close the Edit Topic Modal
        function closeEditTopicModal() {
            document.getElementById('edit-topic-modal').classList.add('hidden');
        }

        // Function to confirm topic deletion
        function confirmDeleteTopic(topic) {
            if (confirm('Are you sure you want to delete the topic "' + topic + '"?')) {
                window.location.href = "{{ route('deleteTopic') }}?topic=" + encodeURIComponent(topic);
            }
        }
    </script>
</body>

</html>