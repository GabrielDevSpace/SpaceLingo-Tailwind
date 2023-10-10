<div>
    <div class="p-6 lg:p-6 bg-white border-b border-gray-200">
        <h1 class="ml-4 pb-4 text-2xl font-medium text-gray-900">
            Your Langs:
        </h1>

        <div class="flex flex-wrap -mx-4">
            @foreach($languages as $language)
            <div class="relative w-1/5 px-4 mb-4">
                <button wire:click="confirmDelete('{{ $language->id }}')" class="absolute top-0 left-0 px-1 py-0 bg-gray-700 text-white rounded-full hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-xs ml-0">
                    x
                </button>
                <a href="{{ route('newregister', ['id' => $language->id]) }}" class="block">
                    <div class="flex items-center">
                        @php
                        $imageName = '';
                        if ($language->name === 'English') {
                        $imageName = 'usa.png';
                        } elseif ($language->name === 'Spanish') {
                        $imageName = 'spain.png';
                        } elseif ($language->name === 'French') {
                        $imageName = 'france.png';
                        } elseif ($language->name === 'German') {
                        $imageName = 'germany.png';
                        } elseif ($language->name === 'Japanese') {
                        $imageName = 'japan.png';
                        } elseif ($language->name === 'Italian') {
                        $imageName = 'italy.png';
                        } elseif ($language->name === 'Korean') {
                        $imageName = 'korea.png';
                        } elseif ($language->name === 'Portuguese-Brazil') {
                        $imageName = 'brazil.png';
                        } elseif ($language->name === 'Portuguese-Portugal') {
                        $imageName = 'portugal.png';
                        } elseif ($language->name === 'Chinese') {
                        $imageName = 'china.png';
                        } elseif ($language->name === 'Hindi') {
                        $imageName = 'india.png';
                        } elseif ($language->name === 'Russian') {
                        $imageName = 'russia.png';
                        }
                        @endphp

                        <div class="relative">
                            <img src="{{ asset('images/countries/'.$imageName) }}" alt="{{ $language->name }}" class="w-12 h-12 ml-5 mr-3">
                        </div>
                        <span class="text-base text-gray-600">{{ $language->name }}</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @if($confirmingDelete)
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <!-- Elemento de fundo semi-transparente -->
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <!-- Modal -->
        <div class="modal-container bg-white rounded-lg shadow p-4" style="z-index: 9999;"> <!-- Defina um valor alto para o z-index -->
            <h2 class="text-xl font-semibold text-gray-900">
                Confirm Delete
            </h2>
            <p>Are you sure you want to delete this language?</p>
            <div class="flex justify-end">
                <button wire:click="cancelDelete" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Cancel</button>
                <button wire:click="deleteLanguage" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-sm ml-2">Delete</button>
            </div>
        </div>
    </div>
    @endif
    <div class="ml-2 p-2">
        <!-- Button to open modal -->
        <button wire:click="openAddLanguageModal" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm" type="button">
            Add Language
        </button>
    </div>
    <!-- Modal -->
    @if($showAddLanguageModal)
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <!-- Elemento de fundo semi-transparente -->
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <!-- Modal -->
        <div class="modal-container bg-white rounded-lg shadow p-4" style="z-index: 9999;"> <!-- Defina um valor alto para o z-index -->
            <h2 class="ml-4 text-xl font-semibold text-gray-900">
                Add Language
            </h2>
            <select wire:model.defer="newLanguage" id="languageSelect" class="selected-option">
                <option value="" disabled selected>Select a Language</option>
                <option value="English">English</option>
                <option value="Spanish">Spanish</option>
                <option value="French">French</option>
                <option value="German">German</option>
                <option value="Japanese">Japanese</option>
                <option value="Italian">Italian</option>
                <option value="Korean">Korean</option>
                <option value="Portuguese-Brazil">Portuguese (Brazil)</option>
                <option value="Portuguese-Portugal">Portuguese (Portugal)</option>
                <option value="Chinese">Chinese</option>
                <option value="Hindi">Hindi</option>
                <option value="Russian">Russian</option>
            </select>
            <div class="flex justify-end">
                <button wire:click="closeAddLanguageModal" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Cancel</button>
                <button wire:click="addLanguage" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm ml-2">Add</button>
            </div>
        </div>
    </div>
    @endif
</div>