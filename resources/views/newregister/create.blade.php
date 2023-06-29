<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Register
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('newregister.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="list-radio" class="block font-medium text-sm text-gray-700">Type</label>
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

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="vocabulary" class="block font-medium text-sm text-gray-700">Vocabulary</label>
                            <input type="text" name="vocabulary" id="vocabulary" type="text" autocomplete="off" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('vocabulary')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="translate" class="block font-medium text-sm text-gray-700">Translate</label>
                            <input type="text" name="translate" id="translate" type="text" autocomplete="off" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('translate')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="note" class="block font-medium text-sm text-gray-700">Note</label>
                            <textarea name="note" id="note" autocomplete="off" rows="10" class="form-input rounded-md shadow-sm mt-1 block w-full"></textarea>
                            @error('note')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <div id="charCount"></div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button onclick="this.disabled = true; this.value = 'Enviando…'; this.form.submit();" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    var noteTextarea = document.getElementById('note');
    var charCount = document.getElementById('charCount');
    var form = document.getElementById('myForm');

    noteTextarea.addEventListener('input', function() {
        var note = this.value;
        var noteLength = note.length;
        
        // Verifica se o número de caracteres excede o limite
        if (noteLength > 1500) {
            this.value = note.substr(0, 1500); // Limita o valor do campo a 1500 caracteres
            noteLength = 1500; // Atualiza o comprimento do texto para 1500
            noteTextarea.style.color = 'red'; // Altera a cor do texto para vermelho
        } else {
            noteTextarea.style.color = ''; // Retorna à cor padrão do texto
        }
        
        charCount.textContent = noteLength + ' caracteres';
    });

    form.addEventListener('submit', function(event) {
        var noteLength = noteTextarea.value.length;
        
        // Verifica se o número de caracteres excede o limite
        if (noteLength > 1500) {
            event.preventDefault(); // Impede o envio do formulário
            alert('The NOTE field must have a maximum of 1500 characters.');
        }
    });
</script>
