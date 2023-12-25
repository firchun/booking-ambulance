<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ambulance;
use Livewire\WithPagination;

class DataAmbulance extends Component
{
    use WithPagination;
    public $search;
    public $pagination;
    public $queryString = ['search'=>['except' => '']];
    protected $paginationTheme = 'bootstrap';

    public function updatedSearch(){
        $this->resetPage();
    }

    public function destroy($id){
        if(isset($id)){
            Ambulance::find($id)->delete();
            $this->resetPage();
        }
    }

    public function render()
    {
        $data = Ambulance::where('noPolisi','like','%'.$this->search.'%')->paginate($this->pagination);
        return view('livewire.data-ambulance',['data'=>$data]);
    }
}
