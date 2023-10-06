<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lang;

class Languages extends Component
{
    public $languages;
    public $showAddLanguageModal = false;
    public $newLanguage = '';

    public function render()
    {
        $this->languages = Lang::all();

        return view('livewire.languages');
    }

    public function openAddLanguageModal()
    {
        $this->resetValidation();
        $this->newLanguage = '';
        $this->showAddLanguageModal = true;
    }

    public function closeAddLanguageModal()
    {
        $this->showAddLanguageModal = false;
    }

    public function addLanguage()
    {
        $this->validate([
            'newLanguage' => 'required|unique:langs,name',
        ]);

        Lang::create(['name' => $this->newLanguage]);

        $this->languages = Lang::all();
        $this->closeAddLanguageModal();
    }
}

