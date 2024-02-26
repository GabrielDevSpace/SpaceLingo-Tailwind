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
                        <form accept-charset="UTF-8" action="{{ route('five-thousand-v2.update') }}" method="POST">
                            @csrf
                            
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="json" id="output" rows="10" cols="50">{{ $output }}</textarea>
                            
                            <br>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Atualizar</button>
                        </form>
                    </div>

                    <div class="col-span-2">
                        <form accept-charset="UTF-8" action="{{ route('openaiv2.chat') }}" method="POST">
                            @csrf
                            <textarea id="textarea-input" name="textarea-input" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="10" cols="70">
                        - What does the word "got" mean in English?
                        - 3 examples of usage in English and Translation in Portuguese Brazil?
                        - Format a response in array format where you are in the following pattern below and without any statement:
                        - Rules:
                        "word":"" //searched word
                        "use_one":""
                        "use_two":""
                        "use_three":""
                        "translate_one":"" // Entire text translated into Brazilian Portuguese
                        "translate_two":"" // Entire text translated into Brazilian Portuguese
                        "translate_three":"" // Entire text translated into Brazilian Portuguese

                        Expected Return =
                        {
                        "word": "",
                        "use_one": "",
                        "use_two": "",
                        "use_three": "",
                        "translate_one": "",
                        "translate_two": "",
                        "translate_three": ""
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
                                        </p>
                                        <table class="divide-y divide-gray-300 w-full">
                                            <thead class="bg-gray-200">
                                                <tr>
                                                    <th class="px-6 py-2 text-xs text-gray-500">
                                                        Word
                                                    </th>
                                                    <th class="px-6 py-2 text-xs text-gray-500">
                                                        Info
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-red-300">
                                                @foreach ($complete as $completed)
                                                <tr class="">
                                                    <td class="text-sm text-gray-500">
                                                        <b class='text-gray-500'>Word: </b><b class='text-red-600'>{{ $completed->word }}</b> 
                                                    </td>
                                                    <td class="text-sm text-gray-500">
                                                        <div class="overflow-auto max-h-40">
                                                            <b class='text-gray-500'>One: </b> {{ $completed->use_one }}<br>
                                                            <b class='text-gray-500'>One: </b> {{ $completed->translate_one }}
                                                        </div>
                                                        <hr>
                                                        <div class="overflow-auto max-h-40">
                                                            <b class='text-gray-500'>Two: </b> {{ $completed->use_two }}<br>
                                                            <b class='text-gray-500'>Two: </b> {{ $completed->translate_two }}
                                                        </div>
                                                        <hr>
                                                        <div class="overflow-auto max-h-40">
                                                            <b class='text-gray-500'>Three: </b> {{ $completed->use_three }}<br>
                                                            <b class='text-gray-500'>Three: </b> {{ $completed->translate_three }}
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