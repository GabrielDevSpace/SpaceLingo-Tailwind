<?php
namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Lang;

class Languages extends Component
{
    public $languages;
    public $showAddLanguageModal = false;
    public $newLanguage = '';
    public $newLanguageSrcImg = ''; // Adicione este campo para capturar a URL da imagem
    public $confirmingDelete = false;
    public $languageToDelete = null;


    public function render()
    {
        $user_id = user_id();
        $this->languages = Lang::where('user_id', $user_id)->get();

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

        $user_id = user_id();
        $this->validate([
            'newLanguage' => 'required|unique:langs,name,NULL,id,user_id,' . Auth::id(),
        ]);

        Lang::create([
            'user_id' => $user_id,
            'name' => $this->newLanguage,
            'src_img' => $this->newLanguageSrcImg, // Adicione a URL da imagem ao criar o novo idioma
        ]);

        $this->languages = Lang::all();
        $this->closeAddLanguageModal();
    }
    
    public function confirmDelete($languageId)
    {
        $this->confirmingDelete = true;
        $this->languageToDelete = $languageId;
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
        $this->languageToDelete = null;
    }

    public function deleteLanguage()
    {
        $user_id = user_id();
        $language = Lang::where('user_id', $user_id)->find($this->languageToDelete);
    
        if ($language) {
            // Use o método delete em cascata para excluir registros relacionados
            $language->courseOrStudyPlans->each(function ($courseOrStudyPlan) {
                $courseOrStudyPlan->topics->each(function ($topic) {
                    $topic->notes()->delete();
                });
                $courseOrStudyPlan->topics()->delete();
            });
            $language->courseOrStudyPlans()->delete();
            $language->delete();
        }
    
        $this->languages = Lang::all();
        $this->cancelDelete();
    }
    
    
}
