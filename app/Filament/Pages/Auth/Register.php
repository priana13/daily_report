<?php

namespace App\Filament\Pages\Auth;

use App\Models\Divisi;
use Filament\Pages\Page;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Component;

class Register extends BaseRegister
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        $this->getDivisiFormComponent(), 
                    ])
                    ->statePath('data'),
            ),
        ];
    }
 
    protected function getDivisiFormComponent(): Component
    {
        return Select::make('divisi_id')
            ->options(Divisi::pluck('nama', 'id')->toArray())    
            ->label("Divisi")        
            ->required();
    }


}
