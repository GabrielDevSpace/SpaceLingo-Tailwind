<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
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

     # Function to return count of ids regitered this week 
     public function countWeek(){
        $user_id = user_id();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    
        $countWeek = Newregister::where('user_id', '=', $user_id)
        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->count();

        return $countWeek;
     }

     public function countMonth(){
          $user_id = user_id();
          $startOfMonth = Carbon::now()->startOfMonth();
          $endOfMonth = Carbon::now()->endOfMonth();
      
          $countMonth = Newregister::where('user_id', '=', $user_id)
          ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
          ->count();
  
          return $countMonth;
       }
  

     public function render(){ 
          $newregister = Newregister::orderby($this->orderColumn,$this->sortOrder)->select('*');
          if(!empty($this->searchTerm)){
               $user_id = user_id();
               $newregister->where('user_id', $user_id);
               $newregister->orWhere('vocabulary','like',"%".$this->searchTerm."%");
               $newregister->orWhere('translate','like',"%".$this->searchTerm."%");
          }
          $countMonth = $this->countMonth();
          $countWeek = $this->countWeek();
          
          $newregister = $newregister->paginate(10);

          return view('livewire.search-pagination', [
               'newregister' => $newregister,
               'countWeek' => $countWeek,
               'countMonth' => $countMonth
          ],);

     }
}