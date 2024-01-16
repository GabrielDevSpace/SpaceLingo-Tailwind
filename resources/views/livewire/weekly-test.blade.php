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
        <span class="pb-2 text-violet-800">
            <b>Vocabulary learned during the week:</b>

        </span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 justify-center">
        <div class="w-full flex justify-center pb-8">
            <span class="leading-8 text-md">
                @foreach ($vocabulary as $vocabularies)
                <span class="bg-green-500 hover:bg-green-600 text-white text-sm px-2 py-1 rounded-full">{{ $vocabularies->vocabulary }}</span>
                @endforeach
            </span>
        </div>
    </div>
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
                <textarea id="chatGPT" rows="5" placeholder="Prompt" class="border-2 border-gray-200 p-2 w-full rounded-md">Generate a text in the language "{{ $lang }}" with the words below:
    WORDS = @foreach ($vocabulary as $index => $vocabularies)["{{ $vocabularies->vocabulary }}"]{{ !$loop->last ? ',' : '' }}@endforeach

    And also return the translation of this text in the language "{{ $native_language }}" Highlight words with the <u></u> tag

    Detail: if the word is not recognized, just ignore it.
    </textarea>
            </div>
            <div id="divToShowTestdButton" class="p-2 flex justify-end">
                <button wire:click="copyGPT" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                    <i class="fa fa-copy mr-2"></i> Prompt
                </button>
            </div>
        </div>
    </div>
    <div class="bg-white p-2 shadow-md rounded-md">
        <div class="border-gray-200 dark:border-gray-700 mb-4">
            <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                <button wire:click="exibirOriginal" class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="{{ $exibirOriginal ? 'true' : 'false' }}">Original</button>
                </li>
                <li class="mr-2" role="presentation">
                <button wire:click="exibirTranslated" class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="{{ $exibirTranslated ? 'true' : 'false' }}">Translated</button>
                </li>
            </ul>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
            <!-- TABS -->
            <div class="w-full bg-violet-100 border-2 border-violet-300 border-dashed rounded-md" id="myTabContent">

            <div class="{{ $exibirOriginal ? '' : 'hidden' }}" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="p-2 rounded-md">
                        <div id="divToShowOriginal" class="flex items-center">
                            <textarea wire:model="newOriginalText" id="originalText" rows="12" placeholder="Add Original Text" class="border-2 border-gray-200 p-2 w-full rounded-md"></textarea>
                        </div>
                        <div id="divToShowOriginalButton" class="p-2 flex justify-end">
                            <button wire:click="addOriginalText" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                                <i class="fa fa-save mr-2"></i> Original Text
                            </button>
                        </div>
                    </div>
                </div>
                <div class="{{ $exibirTranslated ? '' : 'hidden' }}" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <div class="p-2 rounded-md">
                        <div id="divToShowTranslated" class="flex items-center">
                            <textarea wire:model="newTranslationText" id="TranslatedText" rows="12" placeholder="Add Translated Text" class="border-2 border-gray-200 p-2 w-full rounded-md"></textarea>
                        </div>
                        <div id="divToShowTranslatedButton" class="p-2 flex justify-end">
                            <button wire:click="addTranslationText" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                                <i class="fa fa-save mr-2"></i> Translated Text
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- TABS -->
            <div class="w-full bg-violet-100 border-2 border-violet-300 border-dashed rounded-md">
                <div class="p-2 rounded-md">
                    <div id="divToShowTest" class="flex items-center">
                        <textarea wire:model="newTranslationTest" id="TestText" rows="12" placeholder="Write what you understand from the original text and then compare it with the official translation." class="border-2 border-gray-200 p-2 w-full rounded-md"></textarea>
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
    Livewire.on('copyGPT', ({ text }) => {
        const textarea = document.getElementById('chatGPT');
        textarea.select();
        document.execCommand('copy');
        alert('Text copied to clipboard!');
    });
</script>
