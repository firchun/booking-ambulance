<?php

namespace App\Livewire;

use Livewire\Component; 
use App\Models\Peti;
use Livewire\WithPagination;

class DataPeti extends Component
{
    use WithPagination;
    public $search;
    public $paginate;
    public $queryString = ['search'=>['except'=>'']];
    protected $paginationTheme = 'bootstrap';

    public function updatedSearch(){
        $this->resetPage();
    }

    public function destroy($id){
        if(isset($id)){
            Peti::find($id)->delete();
            $this->resetPage();
        }
    }

    public function render()
    {
        $data = Peti::paginate($this->paginate);
        return view('livewire.data-peti', ['data'=>$data]);
    }
}
