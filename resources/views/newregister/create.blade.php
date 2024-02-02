<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            @php
            $native_language = "Portuguese - Brazil";
            $languageName = \App\Helpers\LanguageImageHelper::getLanguageName($lang_id);
            $imageName = \App\Helpers\LanguageImageHelper::getLanguageImage($lang_id);
            @endphp

            <img src="{{ asset('images/countries/'.$imageName) }}" alt="{{ $languageName }}" class="w-12 h-12 ml-5 mr-3">

            @if (!empty($languageName))
            <span class="font-semibold text-violet-800">{{ $languageName }} - Create Register</span>
            @endif
        </div>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-4 sm:px-4 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('newregister.store', ['lang_id' => $lang_id]) }}">
                    @csrf
                    <div class="shadow-lg overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="list-radio" class="block font-bold text-sm text-violet-800">Type</label>
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <line x1="4" y1="20" x2="7" y2="20" />
                                            <line x1="14" y1="20" x2="21" y2="20" />
                                            <line x1="6.9" y1="15" x2="13.8" y2="15" />
                                            <line x1="10.2" y1="6.3" x2="16" y2="20" />
                                            <polyline points="5 20 11 4 13 4 20 20" />
                                        </svg> &nbsp
                                        <input checked id="horizontal-list-radio-license" type="radio" value="vocabulary" name="type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vocabulary </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" />
                                            <line x1="12" y1="12" x2="12" y2="12.01" />
                                            <line x1="8" y1="12" x2="8" y2="12.01" />
                                            <line x1="16" y1="12" x2="16" y2="12.01" />
                                        </svg> &nbsp
                                        <input id="horizontal-list-radio-id" type="radio" value="expression" name="type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Expression </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M3 12h7l-3 -3m0 6l3 -3" />
                                            <path d="M21 12h-7l3 -3m0 6l-3 -3" />
                                            <path d="M9 6v-3h6v3" />
                                            <path d="M9 18v3h6v-3" />
                                        </svg> &nbsp
                                        <input id="horizontal-list-radio-millitary" type="radio" value="contractions" name="type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="horizontal-list-radio-millitary" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contractions </label>
                                    </div>
                                </li>
                            </ul>
                            @error('type')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pt-5 pb-2 bg-white sm:px-6 py-2">
                            <label for="vocabulary" class="block font-bold text-sm text-violet-800">Vocabulary</label>
                            <input type="text" name="vocabulary" id="vocabulary" type="text" autocomplete="off" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $searchTerm ? $searchTerm : '' }}" />
                            @error('vocabulary')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="divToShowPrompt" class="px-4 bg-white sm:px-6">
                            <div class="py-2 px-2 text-violet-800">
                                <div class="ml-2">
                                    <small>
                                        <li><b>Copy</b> the prompt</li>
                                        <li><b>Paste</b> it into
                                            <div class="flex items-center pl-4">
                                                <a href="https://bard.google.com/chat" target="_BLANK" class="bg-violet-600 hover:bg-violet-900 text-white px-2 py-1 rounded-full ml-2 flex items-center text-xs">
                                                    <i class="fa fa-external-link-square mr-2"></i> Bard
                                                </a>
                                                &nbsp Or
                                                <a href="https://chat.openai.com/" target="_BLANK" class="bg-violet-600 hover:bg-violet-900 text-white px-2 py-1 rounded-full ml-2 flex items-center text-xs">
                                                    <i class="fa fa-external-link-square mr-2"></i> ChatGPT
                                                </a>
                                            </div>
                                        </li>
                                        <li><b>Copy</b> the original text and the generated translation</li>
                                        <li><b>Save</b> it in the Original and Translation tab</li>
                                    </small>
                                </div>
                            </div>
                            <div id="divToShowTest" class="flex items-center relative">
                                <textarea wire:model="chatGPT" id="chatGPT" rows="5" placeholder="Prompt" class="border-2 border-gray-200 p-2 w-full rounded-md text-sm"></textarea>
                            </div>

                            <div id="divToShowTestdButton" class="pt-2 flex justify-end">
                                <!-- Adicione o type="button" para evitar o envio padrão do formulário -->
                                <button id="copyButton" type="button" onclick="copyToClipboardWithoutSubmit()" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                                    <i class="fa fa-copy mr-2"></i> Prompt
                                </button>
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="translate" class="block font-bold text-sm text-violet-800">Translate</label>
                            <input type="text" name="translate" id="translate" type="text" autocomplete="off" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('translate')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="note" class="block font-bold text-sm text-violet-800">Note</label>
                            <textarea name="note" id="note" autocomplete="off" rows="20" class="form-input rounded-md shadow-sm mt-1 block w-full"></textarea>
                            <span id="character-count" class="text-sm text-red-600"></span>
                            @error('note')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button id="submitbutton" onclick="this.disabled = true; this.value = 'Creating…'; this.form.submit();" class="inline-flex items-center bg-violet-800 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded-full">
                                <i class="fa fa-save"></i> &nbsp Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    const noteTextarea = document.getElementById('note');
    const characterCount = document.getElementById('character-count');
    const createButton = document.getElementById('submitbutton');
    noteTextarea.addEventListener('input', function() {
        const textLength = noteTextarea.value.length;
        characterCount.textContent = textLength + " Characters";

        if (textLength > 1500) {
            characterCount.style.color = 'red';
            noteTextarea.style.color = 'red';
            createButton.disabled = true;
        } else {
            noteTextarea.style.color = 'black';
            characterCount.style.color = 'black';
            createButton.disabled = false;
        }
    });
</script>
<script>
    // Função para verificar e ativar a div do chatGPT
    function checkAndActivateChatGPT() {
        const vocabularyInput = document.getElementById('vocabulary');
        const chatGPTDiv = document.getElementById('divToShowPrompt');

        // Verificar se o input "vocabulary" tem um valor
        if (vocabularyInput.value.trim() !== '') {
            // Ativar a div do chatGPT
            chatGPTDiv.style.display = 'block';
        } else {
            // Desativar a div do chatGPT se o input "vocabulary" estiver vazio
            chatGPTDiv.style.display = 'none';
        }
    }

    // Adicionar um ouvinte de evento 'input' ao input "vocabulary" para chamar a função sempre que houver uma modificação
    document.getElementById('vocabulary').addEventListener('input', checkAndActivateChatGPT);

    // Chamar a função ao carregar a página para verificar o valor inicial do input "vocabulary"
    window.addEventListener('load', checkAndActivateChatGPT);
</script>

<script>
    // Função para capturar e atribuir o valor do elemento com id "vocabulary" ao textarea "chatGPT"
    function updateChatGPT() {
        const vocabularyInput = document.getElementById('vocabulary');
        const chatGPTTextarea = document.getElementById('chatGPT');

        // Texto padrão com a palavra-chave substituída
        const defaultText = `My native language is "{{ $native_language }}" and the language I am learning is "{{ $languageName }}", that being said:

What would be the translation for the word "${vocabularyInput.value}" and also give me at least 5 or more examples of the use of this word in the "{{ $languageName }}" language and also give me the "{{ $native_language }}" translation of each of these examples.

Attention: Generate the response in my native language.`;

        // Atribuir o valor do input "vocabulary" ao textarea "chatGPT"
        chatGPTTextarea.value = defaultText;
    }

    // Adicionar um ouvinte de evento 'input' ao input "vocabulary" para chamar a função sempre que houver uma modificação
    document.getElementById('vocabulary').addEventListener('input', updateChatGPT);

    // Chamar a função ao carregar a página para garantir que o valor inicial seja transferido para o textarea "chatGPT"
    window.addEventListener('load', updateChatGPT);
</script>
<script>
    function copyToClipboardWithoutSubmit() {
        var textarea = document.getElementById('chatGPT');
        textarea.select();
        document.execCommand('copy');

        // Altera o texto e a cor do botão
        var button = document.getElementById('copyButton');
        button.classList.remove('bg-violet-600');
        button.classList.remove('hover:bg-violet-900');
        button.classList.add('bg-gray-400');
        button.classList.add('hover:bg-gray-500');
        button.innerHTML = '<i class="fa fa-copy mr-2"></i> Prompt Copied';

        // Remove a cor original e adiciona a nova cor


        // Define um tempo limite para restaurar o estado original do botão
        setTimeout(function() {
            button.classList.remove('bg-gray-400');
            button.classList.remove('hover:bg-gray-500');
            button.classList.add('bg-violet-600');
            button.classList.add('hover:bg-violet-900');
            button.innerHTML = '<i class="fa fa-copy mr-2"></i> Prompt';
        }, 3000); // O estado original será restaurado após 2 segundos
    }
</script>