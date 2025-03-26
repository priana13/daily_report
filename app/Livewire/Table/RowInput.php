<?php

namespace App\Livewire\Table;

use Livewire\Component;
use App\Models\LaporanHarian;

class RowInput extends Component
{
    public $laporan;

    public $warna;

    public $nomor;

    public $record;

    public $isEdit = false;

    public function mount($laporan , $warna , $nomor)
    {
        $this->laporan = $laporan;
        $this->warna = $warna;
        $this->nomor = $nomor;

    }

    public function render()
    {
        return view('livewire.table.row-input');
    }

    public function edit($record)
    {
        $this->isEdit = true;

        $this->record = $record;
    }

    public function deleteData($id){

        $laporan = LaporanHarian::find($id);

        $laporan->delete();

        $this->dispatch('refreshParent');

    }
    
}
