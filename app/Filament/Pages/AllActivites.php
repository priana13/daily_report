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
        ->whereDate('tanggal' , '>=', date('Y-m-01'))
        ->groupBy('tanggal')->pluck('jumlah', 'tanggal')->toArray();  
            

        return [
            'data_laporan' => $data_laporan            
        ];
        
    }



}
