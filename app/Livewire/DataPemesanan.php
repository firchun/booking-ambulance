<?php

// namespace App\Livewire;

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pemesanan;
use Livewire\WithPagination;

class DataPemesanan extends Component
{
    use WithPagination;
    public $search;
    public $paginate;
    public $queryString = ['search' => ['except' => '']];
    protected $paginationTheme = 'bootstrap';

    public function udpatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data = Pemesanan::join('ambulance', 'ambulance.id', '=', 'pemesanan.ambulance_id')
            ->join('pengguna', 'pengguna.id', '=', 'pemesanan.pengguna_id')
            ->select('ambulance.merk', 'ambulance.noPolisi', 'pengguna.nama', 'pemesanan.*')
            ->paginate($this->paginate);
        return view('livewire.data-pemesanan', ['data' => $data]);
    }
}
