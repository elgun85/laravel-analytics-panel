<?php

namespace App\Filament\Pages;

use App\Services\Dovriyye_analitic;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class DovriyyeAnalitic extends Page
{

public $data;

public function mount(Dovriyye_analitic $service)
    {
        $this->data =  $service->Dovriyye_analitic();

       // dd($this->data);
    }



    protected static string|BackedEnum|null $navigationIcon = Heroicon::Gift;

    protected string $view = 'filament.pages.dovriyye-analitic';
}
