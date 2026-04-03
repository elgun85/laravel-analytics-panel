<?php

namespace App\Filament\Pages;

use App\Services\BonusService;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;

class Bonus extends Page
{
    public $data;
    public $menzil_say, $qurum, $data_analizi, $a;
    //use InteractsWithTable;



    public function mount(BonusService $service)
    {
        // $this->data =  $service->bonus();
        $this->data = $service->tekrar_nomre_sayi();

        $this->data_analizi = $service->tekrar_nomre_sayi_analizi();
        
        $this->a = $this->data_analizi['a'];
        $this->menzil_say = $this->data_analizi['menzil_say'];
        $this->qurum = $this->data_analizi['qurum'];

            // dd($this->menzil_say);

    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Gift;


    protected string $view = 'filament.pages.bonus';
}
