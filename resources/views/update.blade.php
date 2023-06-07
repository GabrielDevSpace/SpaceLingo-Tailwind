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
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="json" rows="10" cols="50"></textarea>
                            <br>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 roundedy" type="submit">Atualizar</button>
                        </form>
                    </div>

                    <div class="col-span-2">
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="10" cols="70">
                            Qual o significado da palavra em inglês "got", quando podemos utilizá-la, quais suas variações, e como soa no português? Formate a resposta no formato de array onde esteja no seguinte padrão:

                            [
                            {
                                "word": "palavra pesquisada",
                                "translate": ["todas as traduções da palavra"],
                                "use": [
                                    "O máximo de exemplos de uso iniciando com exemplo em inglês e depois traduzindo os exemplos"
                                ],
                                "variation": [
                                    "as variações possíveis, presente, futuro, passado, etc e sua tradução."
                                ],
                                "pronunciation": [
                                    "como se pronuncia no português, qual o som dessa palavra"
                                ]
                            }
                            ]
                        </textarea>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <div class="container flex justify-center mx-auto">
                            <div class="flex flex-col">
                                <div class="w-full">
                                    <div class="border-b border-gray-200 shadow">
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
                                                        <a href="#" class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
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
</html>