<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                <div class="flex flex-col">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Vocabulary
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Translate
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Note
                                            </th>
                                            <th scope="col" class="p-4">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        @foreach ($newregister as $newregister)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="p-4 w-4">
                                                {{$newregister->vocabulary}}
                                            </td>
                                            <td class="p-4 w-4">
                                                {{$newregister->translate}}
                                            </td>
                                            <td class="p-4 w-4">
                                                {{$newregister->note}}
                                            </td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <a href="{{ route('newregister.show', $newregister->id )}}" class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    <a href="{{ route('newregister.edit', $newregister->id )}}" class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                        <form class="inline-block" action="{{ route('newregister.destroy', $newregister->id) }}">
                                                        <input type='text' name='_method' value='DELETE'>
                                                        <input type='text' name='_token' value='{{ csrf_token() }}'>
                                                        <input type='submit' name='text-red-600 hover:text-red-900 mb-2'>
                                                        </form>
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="mt-5">This table component is part of a larger, open-source library of Tailwind CSS components. Learn
                    more
                    by going to the official <a class="text-blue-600 hover:underline" href="#" target="_blank">Flowbite Documentation</a>.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>