<?php

function alertMessage($type, $message)
{
    app(\App\Http\Livewire\CourseTopicDropdowns::class)->dispatchBrowserEvent(
        'alert',
        ['type' => $type, 'message' => $message]
    );
}