<?php

namespace App\Filament\Resources\Dovriyyes\Pages;

use App\Filament\Exports\DovriyyeExporter;
use App\Filament\Resources\Dovriyyes\DovriyyeResource;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;

class ListDovriyyes extends ListRecords
{
    protected static string $resource = DovriyyeResource::class;



    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make('export')
                ->label('Export')
                ->exporter(DovriyyeExporter::class),
        ];
    }

    
}
