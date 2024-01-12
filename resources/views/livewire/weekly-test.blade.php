<div class="bg-white p-2 shadow-md rounded-md">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
        <div class="w-full">
            <div class="pt-2 pb-8 px-4">
                <h3 class="pb-2 text-violet-800">
                    <b>Vocabulary learned during the week:</b>
                </h3>
                <span class="leading-8 text-md">
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">ipsum</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">dolor</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">sit</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">consectetur</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">placeat</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">laudantium</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">adipisicing</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">Recusandae</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">quos</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">natus</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">elit</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">illo</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">maxime</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">repellat</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">earum</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">officia</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">earum</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">repudiandae</b>
                    <b class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full">WordOne</b>
                </span>
            </div>
        </div>
        <div class="w-full">
            <div class="p-2 rounded-md">
                <h3 class="pb-2 text-violet-800">
                    <b>ChatGPT prompt to generate text with learned vocabulary:</b>
                    <div class="py-2 px-2">
                        <small>
                            <li>Copy the prompt</li>
                            <li>Paste it into chatGPT</li>
                            <li>Copy the original text and the generated translation</li>
                            <li>Save it in the Original or Translated tab</li>
                        </small>
                    </div>
                </h3>
                <div id="divToShowTest" class="flex items-center">
                    <textarea wire:model="newTestText" id="TestText" rows="10" placeholder="Prompt" class="border-2 border-gray-200 p-2 w-full rounded-md"></textarea>
                </div>
                <div id="divToShowTestdButton" class="p-2 flex justify-end">
                    <button wire:click="addTestText" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                        <i class="fa fa-copy mr-2"></i> Prompt
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-white p-4 shadow-md rounded-md">
    <div class="border-gray-200 dark:border-gray-700 mb-4">
        <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Original</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="true">Translated</button>
            </li>
        </ul>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
        <!-- TABS -->
        <div class="w-full m-1 bg-violet-100 border-2 border-violet-300 border-dashed rounded-md" id="myTabContent">

            <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="p-4 rounded-md">
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
            <div class="" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="p-4 rounded-md">
                    <div id="divToShowTranslated" class="flex items-center">
                        <textarea wire:model="newTranslatedText" id="TranslatedText" rows="12" placeholder="Add Translated Text" class="border-2 border-gray-200 p-2 w-full rounded-md"></textarea>
                    </div>
                    <div id="divToShowTranslatedButton" class="p-2 flex justify-end">
                        <button wire:click="addTranslatedText" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                            <i class="fa fa-save mr-2"></i> Translated Text
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <!-- TABS -->
        <div class="w-full m-1 bg-violet-100 border-2 border-violet-300 border-dashed rounded-md">
            <div class="p-4 rounded-md">
                <div id="divToShowTest" class="flex items-center">
                    <textarea wire:model="newTestText" id="TestText" rows="12" placeholder="Write what you understand from the original text and then compare it with the official translation." class="border-2 border-gray-200 p-2 w-full rounded-md"></textarea>
                </div>
                <div id="divToShowTestdButton" class="p-2 flex justify-end">
                    <button wire:click="addTestText" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center">
                        <i class="fa fa-save mr-2"></i> Test Text
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>