<?php

namespace App\Filament\Resources\Dovriyyes;

use App\Filament\Resources\Dovriyyes\Pages\CreateDovriyye;
use App\Filament\Resources\Dovriyyes\Pages\EditDovriyye;
use App\Filament\Resources\Dovriyyes\Pages\ListDovriyyes;
use App\Filament\Resources\Dovriyyes\Schemas\DovriyyeForm;
use App\Filament\Resources\Dovriyyes\Tables\DovriyyesTable;
use App\Models\Dovriyye;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Services\Dovriyye_analitic;

class DovriyyeResource extends Resource
{
    protected static ?string $model = Dovriyye::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'hesab';

    public static function form(Schema $schema): Schema
    {
        return DovriyyeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        $service = new Dovriyye_analitic();
        return DovriyyesTable::configure($table)
            ->query($service->Debitor());
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDovriyyes::route('/'),
            'create' => CreateDovriyye::route('/create'),
            'edit' => EditDovriyye::route('/{record}/edit'),
        ];
    }
}
