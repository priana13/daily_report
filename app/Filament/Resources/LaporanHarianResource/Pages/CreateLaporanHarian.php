<?php

namespace App\Filament\Resources\LaporanHarianResource\Pages;

use App\Filament\Resources\LaporanHarianResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLaporanHarian extends CreateRecord
{
    protected static string $resource = LaporanHarianResource::class;

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $data['user_id'] = auth()->id();
    
    //     return $data;
    // }

    protected function afterCreate(): void
    {     

        // $this->record->user_id = auth()->id();
        // $this->record->divisi_id = auth()->user()->divisi_id;
        // $this->record->save();
    }


}
