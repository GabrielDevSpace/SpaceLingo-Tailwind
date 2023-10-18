<div class="bg-white p-4 shadow-md rounded-md">
    <h1 class="ml-4 pb-4 text-2xl text-violet-800">
        <b>Course Notes</b>
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
        <div class="w-full m-1 bg-violet-100 border-2 border-violet-300 border-dashed rounded-md">
            <div class="p-4 rounded-md"> <!-- Add a card for the Course section -->
                <div id="divToShowCourse" class="flex items-center"> <!-- Use items-center to align input and button vertically -->
                    <input wire:model="newCourse" id="newCourse" placeholder="Add New Course" class="border-2 border-gray-200 p-2 w-full rounded-full">
                    <button wire:click="addCourse" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center"> <!-- Add flex and items-center -->
                        <i class="fa fa-plus mr-2"></i> Course <!-- Add mr-2 class for margin to the right of the icon -->
                    </button>
                </div>
            </div>
            <div class="p-4">
                <label for="course" class="text-violet-800 block font-bold">Select a Course</label>
                <select wire:model="selectedCourse" id="course" class="border p-2 w-full rounded-full">
                    <option value="">Select a course</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if ($selectedCourse)
        <div class="w-full m-1 bg-violet-100 border-2 border-violet-300 border-dashed rounded-md">
            <div class="p-4 rounded-md">
                <div id="divToShowTopic" class="flex items-center"> <!-- Use items-center to align input and button vertically -->
                    <input wire:model="newTopic" id="newTopic" placeholder="Add New Topic" class="border-2 border-gray-200 p-2 w-full rounded-full">
                    <button wire:click="addTopic" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full ml-2 flex items-center"> <!-- Add flex and items-center -->
                        <i class="fa fa-plus mr-2"></i> Topic <!-- Add mr-2 class for margin to the right of the icon -->
                    </button>
                </div>
            </div>
            <div class="p-4">
                <label for="topic" class="text-violet-800 block font-bold">Select a Topic</label>
                <select wire:model="selectedTopic" id="topic" class="border p-2 w-full rounded-full">
                    <option value="">Select a topic</option>
                    @foreach ($topics as $topic)
                    <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif
    </div>

    @if ($selectedTopic)
    <div class="p-4 text-right">
        <button wire:click="fetchNotes" id="fetchNotesButton" class="bg-violet-700 hover:bg-violet-900 text-white px-4 py-2 rounded-full"> <i class="fa fa-search mr-2"></i>Search Notes</button>
    </div>
    @endif

    @if ($notes)
    @if ($selectedCourse && $selectedTopic)
    <div class="m-1 p-4 md:w-2/2 bg-violet-100 border-2 border-violet-300 border-dashed rounded-md">
        <label for="notes" class="block font-bold text-violet-800">Notes</label>
        <textarea id="notes" class="border p-2 w-full rounded" rows="8" wire:model="notes"></textarea>
        <div class="p-4 text-right">
            <button wire:click="saveNotes" class="bg-violet-600 hover:bg-violet-900 text-white px-4 py-2 rounded-full">
                <i class="fa fa-save mr-2"></i>
                Save Notes
            </button>
        </div>
    </div>
    @endif
    @endif
</div>
<script>
    $(document).ready(function() {
        // Seletor para o botão
        var buttonSelector = '#fetchNotesButton';

        // Acione o clique no botão automaticamente quando o documento estiver pronto
        $(buttonSelector).trigger('click');
    });
</script>
