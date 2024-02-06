<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">


    <title>Document</title>
</head>

<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">

                <h1>Atualizar registros</h1>

                @if(session('message'))
                <div class="text-green-600">
                    {{ session('message') }}
                </div>
                @endif

                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <form accept-charset="UTF-8" action="{{ route('five-thousand.update') }}" method="POST">
                            @csrf
                            
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="json" id="output" rows="10" cols="50">{{ $output }}</textarea>
                            
                            <br>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Atualizar</button>
                        </form>
                    </div>

                    <div class="col-span-2">
                        <form accept-charset="UTF-8" action="{{ route('openai.chat') }}" method="POST">
                            @csrf
                            <textarea id="textarea-input" name="textarea-input" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="10" cols="70">
                            - What does the word "got" mean in English?
                        - 3 or more examples of usage in English and Translation in Portuguese?
                        - What are its variations in the past, present, future?
                        - how pronounced?
                        - 3 test questions about the word informed
                        - Format a response in array format where you are in the following pattern below and without any statement:
                        - Rules:
                        "word":"" //searched word
                        "translate":"" //all translations of the word, separated with comma
                        "Usage_Example_One_English":"",
                        "Usage_Example_One_Translation_Portuguese":"",
                        "Usage_Example_Two_English":"",
                        "Usage_Example_Two_Translation_Portuguese":"",
                        "Usage_Example_Three_English":"",
                        "Usage_Example_Three_Translation_Portuguese":"",
                        "variation_past":""
                        "variation_present":""
                        "variation_future":""
                        "pronunciation":"" //How to pronounce the searched word in Portuguese
                        "question1":"" //Generate an English sentence with blank space for a person to complete with the search word "got" in the Past tense
                        "question2":"" //Generate an English sentence with blank space for a person to complete with the search word "got" in the Present tense
                        "question3":"" //Generate an English sentence with blank space for a person to complete with the search word "got" in the Future tense
                        "answer1":"" //return the answer that will fill in the blank in question1
                        "answer2":"" //return the answer that will fill in the blank in question2
                        "answer3":"" //return the answer that will fill in the blank in question3     

                        Expected Return =
                        {
                        "word": "",
                        "translate": "",
                        "Usage_Example_One_English": "",
                        "Usage_Example_One_Translation_Portuguese": "",
                        "Usage_Example_Two_English": "",
                        "Usage_Example_Two_Translation_Portuguese": "",
                        "Usage_Example_Three_English": "",
                        "Usage_Example_Three_Translation_Portuguese": "",
                        "variation_past": "",
                        "variation_present": "",
                        "variation_future": "",
                        "pronunciation": "",
                        "question1": "",
                        "question2": "",
                        "question3": "",
                        "answer1": "",
                        "answer2": "",
                        "answer3": ""
                        }

                            </textarea>
                            <!-- Adicione outros campos do formulário conforme necessário -->
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit">Generate Chat</button>
                        </form>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 pt-5">
                    <div class="col-span-1">
                        <div class="container flex justify-center mx-auto">
                            <div class="flex flex-col">
                                <div class="w-full">
                                    <div class="border-b border-gray-200 shadow">
                                        <span>Faltam: {{ $newregistersCounts }} Palavras</span>
                                        <table class="divide-y divide-gray-300">
                                            <thead class="bg-black">
                                                <tr>
                                                    <th class="px-6 py-2 text-xs text-white">
                                                        Vocabulary
                                                    </th>
                                                    <th class="px-6 py-2 text-xs text-white">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-300">
                                                @foreach ($newregisters as $newregister)
                                                <tr class="whitespace-nowrap">
                                                    <td class="px-6 py-4 text-sm text-gray-500">
                                                        {{ $newregister->vocabulary }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="#" id="{{ $newregister->vocabulary }}" class="edit-button px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <hr>
                                        <span>Faltam: {{ $wordsCount }} Palavras</span>
                                        <table class="divide-y divide-gray-300">
                                            <thead class="bg-gray-200">
                                                <tr>
                                                    <th class="px-6 py-2 text-xs text-gray-500">
                                                        Word
                                                    </th>
                                                    <th class="px-6 py-2 text-xs text-gray-500">
                                                        Name
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-300">
                                                @foreach ($words as $word)
                                                <tr class="whitespace-nowrap">
                                                    <td class="px-6 py-4 text-sm text-gray-500">
                                                        {{ $word->word }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="#" id="{{ $word->word }}" class="edit-button px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="container justify-center mx-auto">
                            <div class="flex flex-col">
                                <div class="w-full">
                                    <div class="border-b border-gray-200 shadow">
                                        <span>Foram cadastradas: {{ $completeCount }} Palavras</span>
                                        <p>
                                        <div>
                                            <!-- Exibindo a contagem de registros -->
                                            <p>Total de registros cadastrados hoje: {{ $registrationStats['registrationCount'] }}</p>

                                            <!-- Exibindo o tempo médio por registro -->
                                            <p>Tempo médio por registro: {{ $registrationStats['timePerRegistration'] }}</p>

                                            <!-- Exibindo o tempo estimado para 300 registros -->
                                            <p>Tempo estimado para 300 registros: {{ $registrationStats['estimatedTimeFor300'] }}</p>

                                        </div>
                                        </p>
                                        <table class="divide-y divide-gray-300">
                                            <thead class="bg-gray-200">
                                                <tr>
                                                    <th class="px-6 py-2 text-xs text-gray-500">
                                                        Word/Translate
                                                    </th>
                                                    <th class="px-6 py-2 text-xs text-gray-500">
                                                        Info
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-300">
                                                @foreach ($complete as $completed)
                                                <tr class="">
                                                    <td class="text-sm text-gray-500">
                                                        <b class='text-green-600'>Word: </b> {{ $completed->word }}
                                                        <b class='text-blue-600'>Translate: </b> {{ $completed->translate }}
                                                    </td>
                                                    <td class="text-sm text-gray-500">
                                                        <b class='text-blue-600'>Use: </b>
                                                        <div class="overflow-auto max-h-40">
                                                            {{ $completed->use }}
                                                        </div>
                                                        <b class='text-blue-600'>Variation: </b>
                                                        <div class="overflow-auto max-h-40">
                                                            {{ $completed->variation }}
                                                        </div>
                                                        <b class='text-blue-600'>Pronunciation: </b> {{ $completed->pronunciation }}
                                                        <div class="overflow-auto max-h-40">
                                                            <hr>
                                                            <b class='text-blue-600'>Question One: </b> {{ $completed->question1 }}<br>
                                                            <b class='text-blue-600'>Answer: </b> {{ $completed->answer1 }}
                                                        </div>
                                                        <hr>
                                                        <div class="overflow-auto max-h-40">
                                                            <b class='text-blue-600'>Question Two: </b> {{ $completed->question2 }}<br>
                                                            <b class='text-blue-600'>Answer: </b> {{ $completed->answer2 }}
                                                        </div>
                                                        <hr>
                                                        <div class="overflow-auto max-h-40">
                                                            <b class='text-blue-600'>Question Three: </b> {{ $completed->question3 }}<br>
                                                            <b class='text-blue-600'>Answer: </b> {{ $completed->answer3 }}
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // Get the "Edit" buttons
    const editButtons = document.querySelectorAll('.edit-button');

    // Add click event listener to each "Edit" button
    editButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();

            const textarea = document.getElementById('textarea-input');
            const wordId = event.target.id;
            const word = event.target.parentElement.previousElementSibling.innerText.trim();

            // Crie uma expressão regular global para substituir todas as ocorrências de "got"
            const regex = new RegExp('got', 'g');

            // Substitua todas as ocorrências de "got" com a palavra selecionada
            const newText = textarea.value.replace(regex, word);

            // Copie o texto atualizado para a área de transferência
            navigator.clipboard.writeText(newText);

            // Cole o texto atualizado na área de texto
            textarea.value = newText;
        });
    });
</script>

</html>