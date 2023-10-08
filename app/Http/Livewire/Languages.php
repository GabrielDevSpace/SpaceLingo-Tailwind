<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lang;

class Languages extends Component
{
    public $languages;
    public $showAddLanguageModal = false;
    public $newLanguage = '';
    public $newLanguageSrcImg = ''; // Adicione este campo para capturar a URL da imagem

    public function render()
    {
        $this->languages = Lang::all();

        return view('livewire.languages');
    }

    public function openAddLanguageModal()
    {
        $this->resetValidation();
        $this->newLanguage = '';
        $this->newLanguageSrcImg = ''; // Certifique-se de limpar o campo da URL da imagem ao abrir o modal
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

        Lang::create([
            'name' => $this->newLanguage,
            'src_img' => $this->newLanguageSrcImg, // Adicione a URL da imagem ao criar o novo idioma
        ]);

        $this->languages = Lang::all();
        $this->closeAddLanguageModal();
    }
}
