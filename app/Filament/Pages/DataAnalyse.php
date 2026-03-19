<?php

namespace App\Filament\Pages;

use App\DTOs\AnalyseDTO;
use App\Services\AnalyseService;
use BackedEnum;
use Dom\Text;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DataAnalyse extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChartBar;

    protected string $view = 'filament.pages.data-analyse';


    public function getTableRecordKey($record): string
    {
        return (string) $record->notel;
    }



    public function table(Table $table): Table
    {
        return $table->query(fn(AnalyseService $service) => $service->getComprehensiveReportQuery())
            ->paginated(false)
            ->defaultSort(null)
            ->modifyQueryUsing(fn ($query) => $query->reorder())
            ->columns([
                TextColumn::make('bashliq')->label('Xidmət Qrupu'),
                TextColumn::make('xidmetin_novu')->label('Xidmət Növü'),
                TextColumn::make('menzil_say')->label('Mənzil (Say)'),
                TextColumn::make('menzil_summa')->money('AZN')->label('Mənzil (Məbləğ)'),
                TextColumn::make('cemi_hesab')->money('AZN')->label('Ümumi'),
            ]);
    }
}
