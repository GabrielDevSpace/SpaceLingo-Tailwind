<div class="w-full bg-white p-2 shadow-md rounded-md overflow-x-hidden">
    <div class="w-full p-2 flex justify-center lg:hidden">
        <button onclick="toggleExpandMobile()" class="bg-violet-600 hover:bg-violet-900 text-white text-sm px-2 py-1 rounded-full flex items-center">
            <i class="fa fa-hand-peace-o mr-2"></i> Read the Welcome
        </button>
    </div>
    <div id="expandMobile" class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-center pb-6">
        <div class="w-full">
            <div class="p-2 lg:p-4 bg-white">
                <b class="pt-1 text-xl font-medium text-violet-800">
                    Welcome to <b class=""><u>SpaceLingo</u></b>, the universe of languages!
                </b>
                <p class="py-4 text-gray-500 leading-relaxed text-gray-600">
                    I developed a language learning system to record new vocabulary words. This evolving tool aims to become a comprehensive resource, offering a range of uses such as <b class="text-violet-800">tests</b>, <b class="text-violet-800">challenges</b>, <b class="text-violet-800">tips</b>, <b class="text-violet-800">quizzes</b> and <b class="text-violet-800">much more</b>. Designed to enhance the learning experience, spacelingo caters to students at different proficiency levels. Join spacelingo as we explore the world of languages together!
                </p>
            </div>
        </div>
        <div class="w-full bg-white grid grid-cols-1 md:grid-cols-4 gap-4 p-2">
            <div class="flex justify-center items-center h-full">
                <div class="max-w-sm border-2 border-dashed border-violet-400 rounded overflow-hidden shadow-lg">
                    <div class="p-2 flex justify-center">
                        <div class="text-violet-800 font-bold text-sm pb-2">
                            Quizzes
                        </div>
                    </div>
                    <div class="p-2">
                        <button class="bg-violet-600 hover:bg-violet-900 text-white text-xs px-2 py-1 rounded-full flex items-center">
                            <i class="fa fa-code mr-2"></i> Coming Soon
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center h-full">
                <div class="max-w-sm border-2 border-dashed border-violet-400 rounded overflow-hidden shadow-lg">
                    <div class="p-2 flex justify-center">
                        <div class="text-violet-800 font-bold text-sm pb-2">
                            Tests
                        </div>
                    </div>
                    <div class="p-2">
                        <button class="bg-violet-600 hover:bg-violet-900 text-white text-xs px-2 py-1 rounded-full flex items-center">
                            <i class="fa fa-code mr-2"></i> Coming Soon
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center h-full">
                <div class="max-w-sm border-2 border-dashed border-violet-400 rounded overflow-hidden shadow-lg">
                    <div class="p-2 flex justify-center">
                        <div class="text-violet-800 font-bold text-sm pb-2">
                            Challenges
                        </div>
                    </div>
                    <div class="p-2">
                        <button class="bg-violet-600 hover:bg-violet-900 text-white text-xs px-2 py-1 rounded-full flex items-center">
                            <i class="fa fa-code mr-2"></i> Coming Soon
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center h-full">
                <div class="max-w-sm border-2 border-dashed border-violet-400 rounded overflow-hidden shadow-lg">
                    <div class="p-2 flex justify-center">
                        <div class="text-violet-800 font-bold text-sm pb-2">
                            Tips
                        </div>
                    </div>
                    <div class="p-2">
                        <button class="bg-violet-600 hover:bg-violet-900 text-white text-xs px-2 py-1 rounded-full flex items-center">
                            <i class="fa fa-code mr-2"></i> Coming Soon
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full p-2">
        <div class="ml-2 p-2">
            <b class="text-xl pb-4 pt-8 text-violet-800">Your Langs </b>
            <button wire:click="openAddLanguageModal" class="px-2 py-1 bg-violet-700 text-white rounded-full hover:bg-violet-900 focus:ring-4 focus:outline-none focus:ring-violet-300 text-md" type="button">
                <i class="fa fa-plus-circle"></i> New Language
            </button>
        </div>
        @if(count($languages) > 0)
        <div class="flex flex-wrap justify-center">
            @foreach($languages as $language)
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
            <div class="max-w-sm rounded overflow-hidden shadow-lg m-2 border-2 border-dashed border-violet-300">
                <div class="bg-violet-100">
                    <button wire:click="confirmDelete('{{ $language->id }}')" class="ml-2 mt-2 px-2 py-0 bg-violet-500 text-white rounded-full hover:bg-violet-900 focus:ring-red-300 text-sm ml-0">
                        <i class="fa fa-trash"></i>
                    </button>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/countries/'.$imageName) }}" alt="{{ $language->name }}" class="w-16 h-16 align-center">
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 flex justify-center">
                            <span class="text-violet-700">{{ $language->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="px-2 pt-2 pb-2 bg-violet-200">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex justify-center">
                            <a href="{{ route('newregister', ['id' => $language->id]) }}" class="block">
                                <button class="px-4 py-2 bg-violet-500 text-white rounded-full hover:bg-violet-700 focus:ring-4 focus:outline-none focus:ring-violet-300 lg:text-md sm:text-xs" type="button">
                                    <i class="fa fa-language"></i> Vocabulary
                                </button>
                            </a>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{ route('weeklytest', ['id' => $language->id]) }}" class="block">
                                <button class="px-4 py-2 bg-violet-500 text-white rounded-full hover:bg-violet-700 focus:ring-4 focus:outline-none focus:ring-violet-300 lg:text-md sm:text-xs" type="button">
                                    <i class="fa fa-calendar"></i> Weekly Test
                                </button>
                            </a>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{ route('coursenotes', ['id' => $language->id]) }}" class="block">
                                <button class="px-4 py-2 bg-violet-500 text-white rounded-full hover:bg-violet-700 focus:ring-4 focus:outline-none focus:ring-violet-300 lg:text-md sm:text-xs" type="button">
                                    <i class="fa fa-pencil-square-o"></i> Notes
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="flex justify-center">
            <span class="text-violet-800 font-bold">No languages found. Create a language to get started!</span>
        </div>
        @endif

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

        <!-- Modal -->
        @if($showAddLanguageModal)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <!-- Elemento de fundo semi-transparente -->
            <div class="fixed inset-0 bg-gray-900 opacity-50"></div>
            <!-- Modal -->
            <div class="modal-container fixed inset-0 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto" style="max-height: 33vh;">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Add Language</h2>
                    <select wire:model.defer="newLanguage" id="languageSelect" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 placeholder-gray-400">
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
                    <div class="mt-4 flex justify-end">
                        <button wire:click="closeAddLanguageModal" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Cancel</button>
                        <button wire:click="addLanguage" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm ml-2">Add</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<livewire:contact-form />
<script>
    // Função para alternar a visibilidade da div expandMobile
    function toggleExpandMobile() {
        var expandMobileDiv = document.getElementById("expandMobile");

        if (expandMobileDiv.style.display === "none" || expandMobileDiv.style.display === "") {
            expandMobileDiv.style.display = "block";
        } else {
            expandMobileDiv.style.display = "none";
        }
    }

    // Ocultar a div expandMobile em telas pequenas ao carregar a página
    window.onload = function() {
        var expandMobileDiv = document.getElementById("expandMobile");
        if (window.innerWidth < 640) { // 640 é um ponto de ruptura típico para smartphones (ajuste conforme necessário)
            expandMobileDiv.style.display = "none";
        }
    };
</script>