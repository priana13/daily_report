<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\LaporanHarian;
use Illuminate\Support\Facades\DB;


class AllActivites extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.all-activites';

    protected static bool $shouldRegisterNavigation = true;

    protected static ?string $title = 'Kalender';

    public $tanggal;

    public $bulan; 

    public $tahun;

    public $hari_pertama;

    public $jumlah_hari;

    public function mount(){

        $this->tanggal = (request()->has('tanggal') ) ? request('tanggal') : date('Y-m-d');


    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {

        $this->bulan = date('m' , strtotime($this->tanggal) );
        $this->tahun = date('Y' , strtotime($this->tanggal) );

        // Tentukan hari pertama bulan ini (1 = Senin, 7 = Minggu)
        $this->hari_pertama = \Carbon\Carbon::create($this->tahun, $this->bulan, 1)->dayOfWeekIso; // ISO: Senin = 1, Minggu = 7

        // Jumlah hari dalam bulan ini
        $this->jumlah_hari = \Carbon\Carbon::create($this->tahun, $this->bulan, 1)->daysInMonth;


        $data_laporan = LaporanHarian::select([
            DB::raw('DAY(tanggal) as tanggal'),
            DB::raw('count(*) as jumlah')
        ])
        ->mine()
        ->whereMonth('tanggal', date('m' , strtotime($this->tanggal) ))
        ->whereYear('tanggal', date('Y' , strtotime($this->tanggal)))
        ->groupBy('tanggal')->pluck('jumlah', 'tanggal')->toArray();  
            

        return [
            'data_laporan' => $data_laporan            
        ];
        
    }


    public function prevDate(){

        $this->tanggal = date('Y-m-d', strtotime($this->tanggal . ' -1 month'));
    }

    public function thisMonth(){

        $this->tanggal = date('Y-m-d');
    }



}
