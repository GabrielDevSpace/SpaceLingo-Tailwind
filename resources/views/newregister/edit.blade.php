<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit New Register
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('newregister.update', $newregister->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="vocabulary" class="block font-medium text-sm text-gray-700">Vocabulary</label>
                            <input type="text" name="vocabulary" id="vocabulary" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('vocabulary', $newregister->vocabulary) }}" />
                            @error('vocabulary')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="translate" class="block font-medium text-sm text-gray-700">Translate</label>
                            <input type="text" name="translate" id="translate" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('translate', $newregister->translate) }}" />
                            @error('translate')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="note" class="block font-medium text-sm text-gray-700">Nwwote</label>
                            <input type="text" name="note" id="note" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('note', $newregister->note) }}" />
                            @error('note')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

