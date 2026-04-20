<?php

namespace App\Filament\Resources\Dovriyyes\Pages;

use App\Filament\Resources\Dovriyyes\DovriyyeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDovriyye extends EditRecord
{
    protected static string $resource = DovriyyeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
