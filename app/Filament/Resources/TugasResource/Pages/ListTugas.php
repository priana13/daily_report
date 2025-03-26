<?php

namespace App\Filament\Resources\TugasResource\Pages;

use App\Filament\Resources\TugasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTugas extends ListRecords
{
    protected static string $resource = TugasResource::class;

    protected static ?string $title = "Tugas Saya";

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("Input Baru")
            ->mutateFormDataUsing(function ($data) {

                if(auth()->user()->level != "Manajer"){

                    $data['divisi_id'] = auth()->user()->divisi_id;
                } 

                return $data;

            }),
        ];
    }
}
