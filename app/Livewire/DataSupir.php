<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Supir;
use Livewire\WithPagination;

class DataSupir extends Component
{
    use WithPagination;
    public $search;
    public $paginate;
    public $queryString = ['search' => ['except' => '']];
    protected $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function destroy($id)
    {
        if (isset($id)) {
            Supir::find($id)->delete();
            $this->resetPage();
        }
    }

    public function render()
    {
        $data = Supir::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        return view('livewire.data-supir',['data'=>$data]);
    }
}
