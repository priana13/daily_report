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

    public $list_tugas;

    public $list_kategori;

    // formulir / model
    public $tugas;
    public $kategori;
    public $status;
    public $deskripsi;

    public function mount($laporan , $warna , $nomor , $list_tugas , $kategori)
    {
        $this->laporan = $laporan;
        $this->warna = $warna;
        $this->nomor = $nomor;

        $this->list_tugas = $list_tugas;
        $this->list_kategori = $kategori;

        $this->tugas = $this->laporan->tugas_id;
        $this->kategori = $this->laporan->kategori_id;
        $this->status = $this->laporan->status;
        $this->deskripsi = $this->laporan->deskripsi;

    }

    public function render()
    {
        return view('livewire.table.row-input');
    }

    public function update()
    {
        
        $this->laporan->tugas_id = $this->tugas;
        $this->laporan->kategori_id = $this->kategori;
        $this->laporan->status = $this->status;
        $this->laporan->deskripsi = $this->deskripsi;
        $this->laporan->save();

        $this->isEdit = false;

    }

    public function deleteData($id){

        $laporan = LaporanHarian::find($id);

        $laporan->delete();

        $this->dispatch('refreshParent');

    }
    
}
