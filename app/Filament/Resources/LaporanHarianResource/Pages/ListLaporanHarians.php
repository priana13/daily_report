<?php

namespace App\Filament\Resources\LaporanHarianResource\Pages;

use App\Filament\Resources\LaporanHarianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanHarians extends ListRecords
{
    protected static string $resource = LaporanHarianResource::class;

    protected static ?string $title = "Laporan Harian";

    protected function getHeaderActions(): array
    {
        return [     

            Actions\Action::make('Grafik')->color('success')->icon('heroicon-o-chart-bar')->url(route('filament.admin.pages.grafik-tugas'))
        ];
    }
}
