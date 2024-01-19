<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Notification;
use Livewire\Component;
use App\Models\ContactRequest;

class ContactForm extends Component
{
    public $reason;
    public $description;
    public $modalOpen = false;
    

    public function render()
    {
        return view('livewire.contact-form');
        $this->alertMessage('success', 'Contact sent!');
    }

    public function alertMessage($type, $message)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => $type,  'message' => $message]
        );
    }
    

    public function saveContact()
    {
        $this->alertMessage('success', 'Contact sent!');
        /*
        // Ensure the user is authenticated
        $user = auth()->user();
        if (!$user) {
            // Handle the case where the user is not authenticated
            $this->alertMessage('error', 'User not authenticated.');
            return;
        }
    
        $user_id = $user->id;
    
        $this->validate([
            'reason' => 'required',
            'description' => 'required',
        ]);
    
        // Now, you can use $user_id in your ContactRequest creation
        ContactRequest::create([
            'reason' => $this->reason,
            'description' => $this->description,
            'user_id' => $user_id,
        ]);
    
        
    
        // Clear the form fields after saving
        $this->reason = '';
        $this->description = '';
        */
    }
}
