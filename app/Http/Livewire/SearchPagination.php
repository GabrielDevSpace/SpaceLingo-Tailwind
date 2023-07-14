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

       public function countAll(){
          $user_id = user_id();

          $countAll = Newregister::where('user_id', '=', $user_id)
          ->count();
  
          return $countAll;
       }
  
  

     public function render(){ 
          $user_id = user_id();
          $newregister = Newregister::orderby($this->orderColumn,$this->sortOrder)->select('*');
          if(!empty($this->searchTerm)){
               $newregister->where('user_id', $user_id)
               ->where(function ($query) {
                    $query->where('vocabulary', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere(function ($query) {
                    $user_id = user_id();
                    $query->where('user_id', $user_id)
                    ->where('translate', 'like', '%' . $this->searchTerm . '%');
                    });
               });
          }
          $countMonth = $this->countMonth();
          $countWeek = $this->countWeek();
          $countAll = $this->countAll();
          
          $newregister->where('user_id', $user_id);
          
          $newregister = $newregister->paginate(10);
          //dd($newregister);
          return view('livewire.search-pagination', [
               'newregister' => $newregister,
               'countWeek' => $countWeek,
               'countAll' => $countAll,
               'countMonth' => $countMonth
          ],);

     }
}