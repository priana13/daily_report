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
            Actions\CreateAction::make()->label("Input Baru")
            ->after(function ($record) {

                $record->user_id = auth()->id();
                $record->divisi_id = auth()->user()->divisi_id;
                $record->save();

            }),
        ];
    }
}
