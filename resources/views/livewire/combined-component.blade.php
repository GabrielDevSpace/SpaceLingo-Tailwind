<div>
    <h2>Lang List</h2>
    <ul>
        @foreach ($langs as $lang)
            <li wire:click="selectLang({{ $lang->id }})" onclick="forceLivewireRefresh()">{{ $lang->name }}</li>
        @endforeach
    </ul>
</div>

<div>
    <h2>Course or Study Plan List</h2>
    <ul>
        @if ($selectedLangId)
            @foreach ($courseOrStudyPlans as $courseOrStudyPlan)
                <li wire:click="selectCourseOrStudyPlan({{ $courseOrStudyPlan->id }})">{{ $courseOrStudyPlan->name }}</li>
            @endforeach
        @endif
    </ul>
</div>

<div>
    <h2>Topic List</h2>
    <ul>
        @if ($selectedCourseOrStudyPlanId)
            @foreach ($topics as $topic)
                <li wire:click="selectTopic({{ $topic->id }})">{{ $topic->name }}</li>
            @endforeach
        @endif
    </ul>
</div>

<div>
    <h2>Note List</h2>
    <ul>
        @if ($selectedTopicId)
            @foreach ($notes as $note)
                <li>{{ $note->content }}</li>
            @endforeach
        @endif
    </ul>
</div>
<script>
    function forceLivewireRefresh() {
        Livewire.emit('refresh');
    }
</script>