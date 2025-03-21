<?php

namespace App\Filament\Pages;

use App\Models\LaporanHarian;
use Filament\Pages\Page;

class MainPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.main-page';

    protected static ?string $title = 'Laporan Hari Ini';

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        $data_laporan = LaporanHarian::get();     

        return [
            'data_laporan' => $data_laporan,
        ];
        
    }

}
