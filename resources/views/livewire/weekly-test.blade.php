<div class="w-full bg-white p-2 shadow-md rounded-md overflow-x-hidden">
    <div class="w-full rounded-md">
        <div class="flex justify-between py-4">
            <button wire:click="previousSaturday" class="bg-violet-600 hover:bg-violet-900 text-white text-xs px-2 py-1 rounded-full flex items-center">
                <i class="fa fa-arrow-left mr-2"></i> Last Week
            </button>
            <b class="text-violet-800 text-xs pt-2">{{ $startDate }} - {{ $endDate }}</b>
            <button wire:click="nextSaturday" class="bg-violet-600 hover:bg-violet-900 text-white text-xs px-2 py-1 rounded-full flex items-center">
                Next Week &nbsp<i class="fa fa-arrow-right mr-2"></i>
            </button>
        </div>
    </div>
    <div class="pt-2 px-4 flex justify-center">
        <span class="text-violet-800">
            <b>Vocabulary learned during the week:</b>
        </span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 justify-center">
        <div class="w-full py-8 flex justify-center ">
            <ul class="flex flex-wrap leading-10">
                @foreach ($vocabulary as $vocabularies)
    <li class="mb-2 mr-2">
        <b class="bg-green-500 hover:bg-green-600 text-white text-md px-2 py-1 rounded-full relative" title="{{ $vocabularies->translate }}">
            {{ $vocabularies->vocabulary }}
            <span class="hidden absolute bg-gray-100 text-gray-700 text-sm px-2 py-1 rounded-md mt-2 -ml-2 z-10 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                {{ $vocabularies->translate }}
            </span>
        </b>
    </li>
@endforeach

            </ul>

        </div>
    </div>
    <button onclick="toggleRegister()" class="bg-violet-600 hover:bg-violet-900 text-white text-xs px-2 py-1 rounded-full flex items-center">
        <i class="fa fa-eye mr-2"></i> Register
    </button>
    <div id="register" class="{{ $registerHidden }}">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
            <div class="w-full">
                <div class="p-2">
                    <span class="pb-2 text-violet-800">
                        <b>ChatGPT prompt to generate text with learned vocabulary:</b>
                        <div class="py-2 px-2">
                            <small>
                                <li><b>Copy</b> the prompt</li>
                                <li><b>Paste</b> it into chatGPT</li>
                                <li><b>Copy</b> the original text and the generated translation</li>
                                <li><b>Save</b> it in the Original or Translated tab</li>
                            </small>
                        </div>
                    </span>
                </div>
            </div>
            <div class="w-full">
                <div id="divToShowTest" class="flex items-center">
                    <textarea wire:model="chatGPT" rows="5" placeholder="Prompt" class="border-2 border-gray-200 p-2 w-full rounded-md"></textarea>
                </div>
                <div id="divToShowTestdButton" class="p-2 flex justify-end">
                    <button wire:click="copyGPT" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                        <i class="fa fa-copy mr-2"></i> Prompt
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
            <!-- TABS -->
            <div class="w-full bg-violet-100 border-2 border-violet-300 border-dashed rounded-md" id="myTabContent">


                <div class="p-2 rounded-md">
                    <div id="divToShowOriginal" class="flex items-center">
                        <textarea wire:model.defer="newOriginalText" id="originalText" rows="12" placeholder="Add Original Text" class="border-2 border-gray-200 p-2 w-full rounded-md"></textarea>
                    </div>
                    <div id="divToShowOriginalButton" class="p-2 flex justify-end">
                        <button wire:click="addOriginalText" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                            <i class="fa fa-save mr-2"></i> Original Text
                        </button>
                    </div>
                </div>
            </div>



            <!-- TABS -->
            <div class="w-full bg-violet-100 border-2 border-violet-300 border-dashed rounded-md">

                <div class="p-2 rounded-md">
                    <div id="divToShowTranslated" class="flex items-center">
                        <textarea wire:model.defer="newTranslationText" id="TranslatedText" rows="12" placeholder="Add Translated Text" class="border-2 border-gray-200 p-2 w-full rounded-md"></textarea>
                    </div>
                    <div id="divToShowTranslatedButton" class="p-2 flex justify-end">
                        <button wire:click="addTranslationText" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                            <i class="fa fa-save mr-2"></i> Translated Text
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ############################################# -->
    <div id="review"  class="pt-4 {{ $reviewHidden }}">
        <div class="border-gray-200 dark:border-gray-700 mb-4">
            <ul class="flex flex-wrap -mb-px" id="myTabReview" data-tabs-toggle="#myTabContentReview" role="tablistReview">
                <li class="mr-2" role="presentation">
                    <button wire:click="exibirOriginalReview" class="inline-block rounded-lg text-white py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:white {{ $exibirOriginalReview ? 'bg-violet-600' : 'bg-gray-200 hover:bg-gray-300' }}" id="profile-tabReview" data-tabs-target="#profileReview" type="button" role="tabReview" aria-controls="profileReview" aria-selected="{{ $exibirOriginalReview ? 'true' : 'false' }}">
                        Original
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button wire:click="exibirTranslatedReview" class="inline-block rounded-lg text-white py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:white {{ $exibirTranslatedReview ? 'bg-violet-600' : 'bg-gray-200 hover:bg-gray-300' }}" id="dashboard-tabReview" data-tabs-target="#dashboardReview" type="button" role="tabReview" aria-controls="dashboardReview" aria-selected="{{ $exibirTranslatedReview ? 'true' : 'false' }}">
                        Translation
                    </button>
                </li>
            </ul>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
            <!-- TABS -->
            <div class="w-full bg-violet-100 border-2 border-violet-300 border-dashed rounded-md" id="myTabContentReview" style="display: flex; flex-direction: column; height: 100%;">
                <div class="p-2 {{ $exibirOriginalReview ? '' : 'hidden' }}" id="profileReview" role="tabpanelReview" aria-labelledby="profile-tabReview" style="flex: 1;">
                    <div class="p-2 rounded-md bg-white border-2 border-gray-200 p-2 rounded-md" style="height: 100%;">
                        {!! $newOriginalText !!}
                    </div>
                </div>
                <div class="p-2 {{ $exibirTranslatedReview ? '' : 'hidden' }}" id="dashboardReview" role="tabpanelReview" aria-labelledby="dashboard-tabReview" style="flex: 1;">
                    <div class="p-2 rounded-md bg-white border-2 border-gray-200 p-2 rounded-md" style="height: 100%;">
                        {!! $newTranslationText !!}
                    </div>
                </div>
            </div>
            <!-- TABS -->
            <div class="w-full bg-violet-100 border-2 border-violet-300 border-dashed rounded-md">
                <div class="p-2 rounded-md">
                    <div id="divToShowTest" class="flex items-center">
                        <textarea wire:model.defer="newTranslationTest" id="TestText" rows="12" placeholder="Write what you understand from the original text and then compare it with the official translation." class="border-2 border-gray-200 p-2 w-full rounded-md"></textarea>
                    </div>
                    <div id="divToShowTestdButton" class="p-2 flex justify-end">
                        <button wire:click="addTranslationTest" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                            <i class="fa fa-save mr-2"></i> Test Text
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    Livewire.on('copiado', texto => {
        console.log("Texto copiado: " + texto);
        alert("Texto copiado: " + texto);
    });
</script>

<script>
    function toggleRegister() {
        var registerDiv = document.getElementById('register');
        registerDiv.classList.toggle('hidden');
    }
</script>
