<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pengguna;
use Livewire\WithPagination;

class DataPengguna extends Component
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
            Pengguna::find($id)->delete();
            $this->resetPage();
        }
    }
    
    public function update($id, $newStatus)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->status = $newStatus;
        $pengguna->save();
    }

    public function render()
    {
        $data = Pengguna::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        return view('livewire.data-pengguna',['data'=>$data]);
    }
}
