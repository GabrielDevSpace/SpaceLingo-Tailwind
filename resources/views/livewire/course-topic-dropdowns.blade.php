<div class="bg-white p-4 shadow-md rounded-md">
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 mb-4 md:pr-2">
            <label for="course" class="block font-bold">Select a Course</label>
            <select wire:model="selectedCourse" id="course" class="border p-2 w-full">
                <option value="">Select a course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full md:w-1/2 mb-4 md:pl-2">
            @if ($selectedCourse)
                <label for="topic" class="block font-bold">Select a Topic</label>
                <select wire:model="selectedTopic" id="topic" class="border p-2 w-full">
                    <option value="">Select a topic</option>
                    @foreach ($topics as $topic)
                        <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>

    @if ($selectedCourse)
        <button wire:click="fetchNotes" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
    @endif

    @if ($notes)
        <div class="mb-4">
            <label for="notes" class="block font-bold">Notes</label>
            <textarea id="notes" class="border p-2 w-full" rows="4" wire:model="notes" readonly></textarea>
        </div>
    @endif
</div>
