<?php

namespace App\Filament\Resources\Dovriyyes\Tables;


use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DovriyyesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // ->defaultSort('d2025jan.hesab', 'asc')
            ->columns([

                TextColumn::make('hesab')->label('Hesab'),
                TextColumn::make('ad')->label('Ad')
                    ->formatStateUsing(
                        fn(string $state): string =>
                        str_replace(
                            ['р', 'у', 'с', 'ф', '°', 'т', 'ц'], // Sizin siyahıdakı köhnə simvollar
                            ['I', 'Ə', 'Ü', 'Ş', 'Ğ', 'Ö', 'Ç'], // Qarşılığı olan düzgün hərflər
                            $state
                        )
                    )
                    ->wrap(),
                TextColumn::make('maliyye_novu')->label('Maliyye Növü'),
                TextColumn::make('borc_yanvar_2025')->label('01.01.2025')->numeric(decimalPlaces: 2, decimalSeparator: ',', thousandsSeparator: ' '),
                TextColumn::make('borc_yanvar_2026')->label('01.01.2026')->numeric(decimalPlaces: 2, decimalSeparator: ',', thousandsSeparator: ' '),
                TextColumn::make('hesablanma_mart_2026')->label('Hesablanma - 01.03.2026') ->numeric(decimalPlaces: 2, decimalSeparator: ',', thousandsSeparator: ' '),
                TextColumn::make('cixis_mart_2026')->label('31.03.2026') ->numeric(decimalPlaces: 2, decimalSeparator: ',', thousandsSeparator: ' '),


            ])
            ->filters([
                //
            ])
            ->recordActions([])
            ->toolbarActions([]);
    }
}
