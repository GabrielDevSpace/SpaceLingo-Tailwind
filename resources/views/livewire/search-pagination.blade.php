<div class="container mx-auto mt-1 pt-3">
    <!-- LAYOUT MOBILE -->
    <div class="mobile-layout lg:hidden">
        <div class="w-full px-2">
            <div class="flex justify-center">
                <div class="w-full mx-auto p-1 grid gap-4 grid-cols-3">
                    <div class="p-4 text-center">
                        <i class="fa fa-calendar fa-2x text-green-600"></i>
                        <p class="text-xs font-bold text-gray-500 uppercase mt-2">Week</p>
                        <p class="font-bold text-violet-800 text-base">{{ $countWeek }}</p>
                    </div>
                    <div class="p-4 text-center">
                        <i class="fa fa-calendar fa-2x text-green-600"></i>
                        <p class="text-xs font-bold text-gray-500 uppercase mt-2">Month</p>
                        <p class="font-bold text-violet-800 text-base">{{ $countMonth }}</p>
                    </div>
                    <div class="p-4 text-center">
                        <i class="fa fa-calendar fa-2x text-green-600"></i>
                        <p class="text-xs font-bold text-gray-500 uppercase mt-2">Total</p>
                        <p class="font-bold text-violet-800 text-base">{{ $countAll }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-4">
                <div class="flex justify-center">
                    <input type="text" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500 placeholder-gray-400" placeholder="Search Vocabulary or Translate" wire:model="searchTerm">
                </div>
                <div class="flex justify-center">
                    <a href="{{ route('newregister.create', ['lang_id' => $lang_id, 'searchTerm' => $searchTerm]) }}" class="bg-violet-800 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded-full"><i class="fa fa-plus-circle"></i> &nbsp Add New Vocabulary</a>
                </div>
            </div>

            <div class="w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase cursor-pointer" wire:click="sortOrder('vocabulary')">
                                Vocabulary {!! $sortLink !!}
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($newregister->count())
                        @foreach ($newregister as $register)
                        <tr>
                            <td class="px-2 py-1 text-sm text-gray-900">

                                <p>
                                    <li class="fa fa-globe text-lg text-green-500"> </li><b class="text-violet-900 text-md">&nbsp {{ $register->vocabulary }}</b>
                                </p>
                                <p>
                                    <li class="fa fa-language text-lg text-blue-700"> </li>&nbsp {{ $register->translate }}</b>
                                </p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex flex-wrap space-x-1 justify-center">

                                    <a href="#" onclick="ShowMobileModal('myMobileModal-{{ $register->id }}')" class="w-8 h-8 flex items-center justify-center focus:outline-none myBtn text-white text-lg py-2 px-4 rounded-full bg-yellow-500 hover:bg-yellow-600 hover:shadow-lg">
                                        <i class="fa fa-info"></i>
                                    </a>

                                    <a href="{{ route('newregister.edit', ['lang_id' => $lang_id, 'register_id' => $register->id]) }}" class="w-8 h-8 flex items-center justify-center focus:outline-none text-white text-lg py-2 px-2 rounded-full bg-blue-500 hover:bg-blue-600 hover:shadow-lg">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form class="inline-block" action="{{ route('newregister.destroy', ['lang_id' => $lang_id, 'destroy_id' => $register->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center focus:outline-none text-white text-lg py-2 px-2 rounded-full bg-red-500 hover:bg-red-600 hover:shadow-lg">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                        @php
                        $svg = getSvgHelper($register->type);
                        @endphp
                        <!-- Modal -->
                        <div class="fixed z-10 inset-0 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="myMobileModal-{{ $register->id }}">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <!-- Background overlay -->
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                <!-- Modal content -->
                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-scroll shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                                                {!! $svg !!}
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                    Vocabulary: <b>{{ $register->vocabulary }}</b>
                                                </h3>
                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                    Translate: <b>{{ $register->translate }}</b>
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">

                                                        @php
                                                        $str_replace = ReplaceTextArea($register->note);
                                                        @endphp

                                                        {!! $str_replace !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="HiddenMobileModal('myMobileModal-{{ $register->id }}')">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <tr>
                            <td class="py-4 px-6 border font-bold text-center text-violet-800" colspan="4">
                                Vocabulary not found
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-4 pb-4">
                {{ $newregister->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

    <!-- LAYOUT DESKTOP -->
    <div class="desktop-layout hidden lg:block">
        <div class="flex justify-center">
            <div class="w-full px-4">
                <div class="grid grid-cols-3 pb-3 content-start">
                    <div class="max-w-sm overflow-hidden">
                        <div class="px-6 py-1">
                            <div class="p-4 text-center">
                                <i class="fa fa-calendar fa-2x text-green-600"></i>
                                <p class="text-xs font-bold text-gray-500 uppercase mt-2">Week</p>
                                <p class="text-center text-xs font-medium text-gray-500 tracking-wider"><b class="font-bold text-violet-800 text-base">{{ $countWeek }}</b> Learned Vocabulary</p>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-sm overflow-hidden">
                        <div class="px-6 py-1">
                            <div class="p-4 text-center">
                                <i class="fa fa-calendar fa-2x text-green-600"></i>
                                <p class="text-xs font-bold text-gray-500 uppercase mt-2">Month</p>
                                <p class="text-center text-xs font-medium text-gray-500 tracking-wider"><b class="font-bold text-violet-800 text-base">{{ $countMonth }}</b> Learned Vocabulary</p>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-sm overflow-hidden">
                        <div class="px-6 py-1">
                            <div class="p-4 text-center">
                                <i class="fa fa-calendar fa-2x text-green-600"></i>
                                <p class="text-xs font-bold text-gray-500 uppercase mt-2">All</p>
                                <p class="text-center text-xs font-medium text-gray-500 tracking-wider"><b class="font-bold text-violet-800 text-base">{{ $countAll }}</b> Learned Vocabulary</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center mb-4">
                    <div>
                        <input type="text" class="w-64 px-4 py-2 rounded-full border border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500 placeholder-gray-400" placeholder="Search Vocabulary or Translate" wire:model="searchTerm">
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('newregister.create', ['lang_id' => $lang_id, 'searchTerm' => $searchTerm]) }}" class="bg-violet-800 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded-full"><i class="fa fa-plus-circle"></i> &nbsp Add New Vocabulary</a>
                    </div>
                </div>

                <div class="w-full">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer" wire:click="sortOrder('type')">
                                    Type {!! $sortLink !!}
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer" wire:click="sortOrder('vocabulary')">
                                    Vocabulary {!! $sortLink !!}
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer" wire:click="sortOrder('translate')">
                                    Translate {!! $sortLink !!}
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($newregister->count())
                            @foreach ($newregister as $register)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex items-center space-x-2">
                                        @php
                                        $svg = getSvgHelper($register->type);
                                        @endphp

                                        {!! $svg !!}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $register->vocabulary }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $register->translate }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="#" onclick="ShowModal('myModal-{{ $register->id }}')" class="bg-green-500 hover:bg-green-600 hover:shadow-lg text-white font-bold mt-1 py-2 px-4 rounded-full">
                                            <i class="fa fa-comment"></i> Note
                                        </a>

                                        <a href="{{ route('newregister.edit',['lang_id' => $lang_id, 'register_id'=> $register->id]) }}" class="focus:outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg text-white font-bold mt-1 py-2 px-4 rounded-full">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <form class="inline-block" action="{{ route('newregister.destroy', ['lang_id' => $lang_id ,'destroy_id' => $register->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="focus:outline-none text-white bg-red-500 hover:bg-red-600 hover:shadow-lg text-white font-bold mt-1 py-2 px-4 rounded-full">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="fixed z-10 inset-0 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="myModal-{{ $register->id }}">
                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <!-- Background overlay -->
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                    <!-- Modal content -->
                                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-violet-100 sm:mx-0 sm:h-10 sm:w-10">
                                                    {!! $svg !!}
                                                </div>
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg leading-6 font-medium text-violet-900" id="modal-title">
                                                        Vocabulary: <b class="bg-green-500 hover:bg-green-600 text-white text-sm px-2 py-1 rounded-full relative">{{ $register->vocabulary }}</b>
                                                    </h3>
                                                    <h3 class="text-lg leading-6 font-medium text-violet-900" id="modal-title">
                                                        <b>Translate:</b> <b class="text-sm">{{ $register->translate }}</b>
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-violet-900">
                                                            @php
                                                            $str_replace = ReplaceTextArea($register->note);
                                                            @endphp

                                                            {!! $str_replace !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-violet-600 text-base font-medium text-white hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="HiddenModal('myModal-{{ $register->id }}')">
                                                <i class="fa fa-close mr-1"></i> Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <tr>
                                <td class="py-4 px-6 border font-bold text-center text-violet-800" colspan="4">
                                    Vocabulary not found
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 pb-4">
                    {{ $newregister->links('pagination::tailwind') }}
                </div>
                <!-- FIM -->
            </div>
        </div>
    </div>
</div>


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