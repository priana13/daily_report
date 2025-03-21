<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AllActivites extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.all-activites';

    protected static bool $shouldRegisterNavigation = true;
}
