<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class GrafikTugas extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.grafik-tugas';

    protected static bool $shouldRegisterNavigation = false;
}
