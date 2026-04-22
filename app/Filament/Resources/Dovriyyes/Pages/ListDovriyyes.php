<?php

namespace App\Filament\Resources\Dovriyyes\Pages;

use App\Exports\DevriyyeExport;
use App\Filament\Exports\DovriyyeExporter;
use App\Filament\Resources\Dovriyyes\DovriyyeResource;
use Filament\Actions\Action;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListDovriyyes extends ListRecords
{
    protected static string $resource = DovriyyeResource::class;



    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make('export')
                ->label('Export')
                ->exporter(DovriyyeExporter::class),

                Action::make('export_excel')
    ->label('Excel-ə çıxar')
    ->icon('heroicon-o-document-arrow-down')
    ->action(fn () => Excel::download(new DevriyyeExport, 'hesabat.xlsx'))
        ];
    }

    
}
