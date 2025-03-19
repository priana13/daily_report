<?php

namespace App\Filament\Resources\TugasResource\Pages;

use App\Filament\Resources\TugasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTugas extends CreateRecord
{
    protected static string $resource = TugasResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if(auth()->user()->level != "Manajer"){

            $data['divisi_id'] = auth()->user()->divisi_id;
        } 

        return $data;
    }
}
