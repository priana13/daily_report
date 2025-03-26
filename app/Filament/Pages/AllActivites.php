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

    protected static ?string $title = 'Semua Tugas';

    public $tanggal;

    public function mount(){

        $this->tanggal = (request()->has('tanggal') ) ? request('tanggal') : date('Y-m-d');
    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {


        $data_laporan = LaporanHarian::select([
            DB::raw('DAY(tanggal) as tanggal'),
            DB::raw('count(*) as jumlah')
        ])
        // ->where('user_id', auth()->user()->id)
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
