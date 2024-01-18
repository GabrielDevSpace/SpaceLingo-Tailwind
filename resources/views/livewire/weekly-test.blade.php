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
        <div class="w-full py-4 px-10 flex justify-center ">
            <ul class="flex flex-wrap leading-8">
                @foreach ($vocabulary as $vocabularies)
                <li class="mb-1 mr-2">
                    <a href="#" onclick="ShowModal('myModal-{{ $vocabularies->id }}')" class="bg-green-500 hover:bg-green-600 text-white text-md px-2 py-1 border-2 border-gray-200 hover:border-gray-100 rounded-full shadow-md relative">{{ $vocabularies->vocabulary }}</a>
                </li>
                <!-- Modal -->
                <div class="fixed z-10 inset-0 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="myModal-{{ $vocabularies->id }}">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Background overlay -->
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                        <!-- Modal content -->
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <span class="text-lg leading-6 font-medium text-violet-900" id="modal-title">
                                            <b>Vocabulary:</b> <b class="bg-green-500 hover:bg-green-600 text-white text-sm px-2 py-1 rounded-full relative">{{ $vocabularies->vocabulary }}</b>
                                        </span>
                                        <h3 class="text-lg leading-6 font-medium text-violet-900" id="modal-title">
                                            <b>Translate:</b> <b class="text-sm">{{ $vocabularies->translate }}</b>
                                        </h3>
                                        <div class="pt-6">
                                            <p class="text-sm text-violet-900">
                                                @php
                                                $str_replace = ReplaceTextArea($vocabularies->note);
                                                @endphp
                                                {!! $str_replace !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-violet-600 text-base font-medium text-white hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="HiddenModal('myModal-{{ $vocabularies->id }}')">
                                    <i class="fa fa-close mr-1"></i> Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </ul>

        </div>
    </div>
    <div class="w-full py-4 flex justify-end">
        <button onclick="toggleRegister()" id="buttonToggleRegister" class="bg-violet-600 hover:bg-violet-900 text-white text-sm px-2 py-1 rounded-full flex items-center">
            <i id="iconToggleRegister" class="fa fa-eye mr-2"></i> Register
        </button>
    </div>
    <div id="register" class="{{ $registerHidden }}">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
            <div class="w-full">
                <div class="p-2">
                    <span class="pb-2 text-violet-800">
                        <b>ChatGPT prompt to generate text with learned vocabulary:</b>
                        <div class="py-2 px-2">
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
                    </span>
                </div>
            </div>
            <div class="w-full pb-4">
                <div id="divToShowTest" class="flex items-center">
                    <textarea wire:model="chatGPT" rows="5" placeholder="Prompt" class="border-2 border-gray-200 p-2 w-full rounded-md text-sm"></textarea>
                </div>
                <div id="divToShowTestdButton" class="pt-2 flex justify-end">
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
    <div id="review" class="pt-4 {{ $reviewHidden }}">
        <div class="border-gray-200 dark:border-gray-700 mb-4">
            <ul class="flex flex-wrap -mb-px" id="myTabReview" data-tabs-toggle="#myTabContentReview" role="tablistReview">
                <li class="mr-2" role="presentation">
                    <button wire:click="exibirOriginalReview" class="inline-block rounded-lg text-white py-2 px-2 text-sm font-medium text-center border-transparent border-b-2 hover:bg-violet-600 dark:white {{ $exibirOriginalReview ? 'bg-violet-600' : 'bg-gray-300' }}" id="profile-tabReview" data-tabs-target="#profileReview" type="button" role="tabReview" aria-controls="profileReview" aria-selected="{{ $exibirOriginalReview ? 'true' : 'false' }}">
                        <i class="fa fa-commenting"></i> Original
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button wire:click="exibirTranslatedReview" class="inline-block rounded-lg text-white py-2 px-2 text-sm font-medium text-center border-transparent border-b-2 hover:bg-violet-600 dark:white {{ $exibirTranslatedReview ? 'bg-violet-600' : 'bg-gray-300' }}" id="dashboard-tabReview" data-tabs-target="#dashboardReview" type="button" role="tabReview" aria-controls="dashboardReview" aria-selected="{{ $exibirTranslatedReview ? 'true' : 'false' }}">
                        <i class="fa fa-language"></i> Translation
                    </button>
                </li>
            </ul>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
            <!-- TABS -->
            <div class="w-full bg-violet-100 border-2 border-violet-300 border-dashed rounded-md" id="myTabContentReview" style="display: flex; flex-direction: column; height: 100%;">
                <div class="p-2 {{ $exibirOriginalReview ? '' : 'hidden' }}" id="profileReview" role="tabpanelReview" aria-labelledby="profile-tabReview" style="flex: 1;">
                    <div class="p-4 rounded-md bg-white border-2 border-gray-200 p-2 rounded-md text-gray-600" style="height: 100%;">
                        {!! $newOriginalText !!}
                    </div>
                </div>
                <div class="p-2 {{ $exibirTranslatedReview ? '' : 'hidden' }}" id="dashboardReview" role="tabpanelReview" aria-labelledby="dashboard-tabReview" style="flex: 1;">
                    <div class="p-4 rounded-md bg-white border-2 border-gray-200 p-2 rounded-md text-gray-600" style="height: 100%;">
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
                            <i class="fa fa-save mr-2"></i> Test
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
        var iconToggleRegister = document.getElementById('iconToggleRegister');

        registerDiv.classList.toggle('hidden');

        if (registerDiv.classList.contains('hidden')) {
            iconToggleRegister.className = 'fa fa-eye mr-2';
        } else {
            iconToggleRegister.className = 'fa fa-eye-slash mr-2';
        }
    }
</script>





<script type="text/javascript">
    function ShowModal(id) {
        var modal = document.getElementById(id);
        modal.style.display = "block";
    }

    function HiddenModal(id) {
        var modal = document.getElementById(id);
        modal.style.display = "";
    }

    function ShowMobileModal(id) {
        var modalMobile = document.getElementById(id);
        modalMobile.style.display = "block";
    }

    function HiddenMobileModal(id) {
        var modalMobile = document.getElementById(id);
        modalMobile.style.display = "";
    }
</script>