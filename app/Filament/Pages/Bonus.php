<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class Bonus extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Gift;

    protected string $view = 'filament.pages.bonus';
}
