<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center h-screen">
            @php
            $languageName = \App\Helpers\LanguageImageHelper::getLanguageName($lang_id);
            $imageName = \App\Helpers\LanguageImageHelper::getLanguageImage($lang_id);
            @endphp

            <img src="{{ asset('images/countries/'.$imageName) }}" alt="{{ $languageName }}" class="w-12 h-12 ml-5 mr-3">

            @if (!empty($languageName))
            <span class="font-semibold">{{ $languageName }} - Vocabulary List</span>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <!-- INICIO PAGINATION -->
                                <livewire:search-pagination :lang_id="$lang_id" />
                                <!-- FIM PAGINAÇÂO -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>