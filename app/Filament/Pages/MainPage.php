<?php

namespace App\Filament\Pages;

use App\Models\Kategori;
use App\Models\LaporanHarian;
use Filament\Pages\Page;

class MainPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.main-page';

    protected static ?string $title = 'Tugas Hari Ini';

    public $tanggal;

    public function mount(){

        $this->tanggal = date('Y-m-d');
    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        $data_laporan = LaporanHarian::whereDate('created_at' , $this->tanggal)->get();     

        return [
            'data_laporan' => $data_laporan,
            'list_kategori' => Kategori::all()
        ];
        
    }

    public function prevDate(){

        $this->tanggal = date('Y-m-d', strtotime($this->tanggal . ' -1 day'));
    }

    public function today(){

        $this->tanggal = date('Y-m-d');
    }

}
