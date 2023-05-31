<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Newregister;

class SearchPagination extends Component
{
     use WithPagination;

     protected $paginationTheme = 'bootstrap';

     public $orderColumn = "vocabulary";
     public $sortOrder = "asc";
     public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';

     public $searchTerm = "";

     public function updated(){
          $this->resetPage();
     }

     public function sortOrder($columnName=""){
          $caretOrder = "up";
          if($this->sortOrder == 'asc'){
               $this->sortOrder = 'desc';
               $caretOrder = "down";
          }else{
               $this->sortOrder = 'asc';
               $caretOrder = "up";
          } 
          $this->sortLink = '<i class="sorticon fa-solid fa-caret-'.$caretOrder.'"></i>';

          $this->orderColumn = $columnName;

     }

     public function render(){ 
          $newregister = Newregister::orderby($this->orderColumn,$this->sortOrder)->select('*');
          if(!empty($this->searchTerm)){
               

               $newregister->orWhere('vocabulary','like',"%".$this->searchTerm."%");
               $newregister->orWhere('translate','like',"%".$this->searchTerm."%");
               
          }
          $user_id = user_id();
          $newregister->where('user_id', $user_id);
          $newregister = $newregister->paginate(10);

          return view('livewire.search-pagination', [
               'newregister' => $newregister,
          ]);

     }
}