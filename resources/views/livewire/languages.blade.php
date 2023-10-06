<div>
    <div class="p-6 lg:p-6 bg-white border-b border-gray-200">
        <h1 class="mt-8 text-2xl font-medium text-gray-900">
            Your Langs:
        </h1>

        <div class="flex flex-wrap mt-4">
            <!-- Loop through languages -->
            @foreach($languages as $language)
            <div class="w-1/4 px-4 mb-4">
                <div class="flex items-center">
                    <img src="{{ $language->src_img }}" alt="{{ $language->name }}" class="w-8 h-8 mr-2">
                    <span class="text-base text-gray-600">{{ $language->name }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="mt-4">
        <!-- Button to open modal -->
        <button wire:click="openAddLanguageModal" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm" type="button">
            Add Language
        </button>
    </div>

    <!-- Modal -->
    @if($showAddLanguageModal)
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="modal-container">
            <div class="modal-content bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-semibold text-gray-900">
                    Add Language
                </h2>
                <input wire:model.defer="newLanguage" type="text" class="border rounded w-full px-3 py-2 mb-3" placeholder="Language Name">
                @error('newLanguage') <span class="text-red-500">{{ $message }}</span> @enderror

                <div class="w-64">
                    <select class="block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="en">
                            English
                            <a href="#">
                                <img src="https://www.countryflags.io/us/flat/32.png" alt="English" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                        <option value="es">
                            Spanish
                            <a href="#">
                                <img src="https://www.countryflags.io/es/flat/32.png" alt="Spanish" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                        <option value="fr">
                            French
                            <a href="#">
                                <img src="https://www.countryflags.io/fr/flat/32.png" alt="French" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                        <option value="de">
                            German
                            <a href="#">
                                <img src="https://www.countryflags.io/de/flat/32.png" alt="German" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                        <option value="ja">
                            Japanese
                            <a href="#">
                                <img src="https://www.countryflags.io/jp/flat/32.png" alt="Japanese" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                        <option value="it">
                            Italian
                            <a href="#">
                                <img src="https://www.countryflags.io/it/flat/32.png" alt="Italian" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                        <option value="ko">
                            Korean
                            <a href="#">
                                <img src="https://www.countryflags.io/kr/flat/32.png" alt="Korean" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                        <option value="pt">
                            Portuguese
                            <a href="#">
                                <img src="https://www.countryflags.io/pt/flat/32.png" alt="Portuguese" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                        <option value="zh">
                            Chinese
                            <a href="#">
                                <img src="https://www.countryflags.io/cn/flat/32.png" alt="Chinese" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                        <option value="hi">
                            Hindi
                            <a href="#">
                                <img src="https://www.countryflags.io/in/flat/32.png" alt="Hindi" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                        <option value="ru">
                            Russian
                            <a href="#">
                                <img src="https://www.countryflags.io/ru/flat/32.png" alt="Russian" class="w-4 h-4 inline-block ml-1">
                            </a>
                        </option>
                    </select>
                </div>


                <div class="flex justify-end">
                    <button wire:click="closeAddLanguageModal" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Cancel</button>
                    <button wire:click="addLanguage" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm ml-2">Add</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>