<?php

namespace App\Filament\Exports;

use App\Models\Dovriyye;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class DovriyyeExporter extends Exporter
{
    protected static ?string $model = Dovriyye::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('hesab')->label('Hesab'),
            ExportColumn::make('ad')->label('Ad')
                ->formatStateUsing(
                    fn(string $state): string =>
                    str_replace(
                        ['р', 'у', 'с', 'ф', '°', 'т', 'ц'],
                        ['İ', 'Ə', 'Ü', 'Ş', 'Ğ', 'Ö', 'Ç'],
                        $state
                    )
                ),
            ExportColumn::make('maliyye_novu')->label('Maliyye Növü'),
            ExportColumn::make('borc_yanvar_2025')->label('01.01.2025')->formatStateUsing(fn($state): string => number_format((float) $state, 2, ',', ' ')),
            ExportColumn::make('borc_yanvar_2026')->label('01.01.2026')->formatStateUsing(fn($state): string => number_format((float) $state, 2, ',', ' ')),
            ExportColumn::make('hesablanma_mart_2026')->label('Hesablanma - 01.03.2026')->formatStateUsing(fn($state): string => number_format((float) $state, 2, ',', ' ')),
            ExportColumn::make('cixis_mart_2026')->label('31.03.2026')->formatStateUsing(fn($state): string => number_format((float) $state, 2, ',', ' ')),

        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your dovriyye export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
