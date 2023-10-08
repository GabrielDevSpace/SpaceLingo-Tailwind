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
    <style>
        .options {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            /* Espaçamento entre a imagem e o texto */
        }

        .options li {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .options li img {
            margin-right: 5px;
            /* Espaçamento entre a imagem e o texto */
        }
    </style>
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

                <div class="custom-select">
                    <select wire:model.defer="newLanguageSrcImg" class="selected-option">
                        <option value="" disabled selected>Select a Lang</option>
                        <option value="🇺🇸">🇺🇸 Inglês</option>
                        <option value="🇪🇸">🇪🇸 Espanhol</option>
                        <option value="🇫🇷">🇫🇷 Francês</option>
                        <option value="🇩🇪">🇩🇪 Alemão</option>
                        <option value="🇯🇵">🇯🇵 Japonês</option>
                        <option value="🇮🇹">🇮🇹 Italiano</option>
                        <option value="🇰🇷">🇰🇷 Coreano</option>
                        <option value="🇧🇷">🇧🇷 Portuguese (Brazil)</option>
                        <option value="🇵🇹">🇵🇹 Português</option>
                        <option value="🇨🇳">🇨🇳 Chinês</option>
                        <option value="🇮🇳">🇮🇳 Híndi</option>
                        <option value="🇷🇺">🇷🇺 Russo</option>
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