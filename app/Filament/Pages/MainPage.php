<?php

namespace App\Filament\Pages;

use App\Models\Kategori;
use App\Models\LaporanHarian;
use App\Models\Tugas;
use Filament\Pages\Page;

class MainPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.main-page';

    protected static ?string $title = 'Tugas Hari Ini';

    public $tanggal;

    public string $tugas;

    public int $kategori;

    public string $status;

    public ?string $deskripsi;

    public function mount(){       

        $this->tanggal = (request()->has('tanggal') ) ? request('tanggal') : date('Y-m-d');
    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        $data_laporan = LaporanHarian::whereDate('created_at' , $this->tanggal)->get();  
        
        $list_tugas = Tugas::query();

        if (auth()->user()->level != "Manajer") {
            $list_tugas->where('divisi_id' , auth()->user()->divisi_id);
        }

        return [
            'data_laporan' => $data_laporan,
            'list_kategori' => Kategori::all(),
            'list_tugas' => $list_tugas->get(),
        ];
        
    }

    public function prevDate(){

        $this->tanggal = date('Y-m-d', strtotime($this->tanggal . ' -1 day'));
    }

    public function today(){

        $this->tanggal = date('Y-m-d');
    }

    public function saveData(){

        $this->validate([
            'tugas' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'deskripsi' => 'required'
        ]);

        $tugas = Tugas::find($this->tugas);   

        $laporan = LaporanHarian::create([
                    'user_id' => auth()->user()->id,
                    'tugas_id' => $this->tugas,
                    'judul' => $tugas->judul,
                    'kategori_id' => $this->kategori,
                    'status' => $this->status,
                    'deskripsi' => $this->deskripsi,
                    'tanggal' => $this->tanggal
                ]);

        $this->reset(['tugas', 'kategori', 'status', 'deskripsi']);

       
    }

    public function deleteData($id){

        $laporan = LaporanHarian::find($id);

        $laporan->delete();
    }

}
