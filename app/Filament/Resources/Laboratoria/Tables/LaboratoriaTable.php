<?php

namespace App\Filament\Resources\Laboratoria\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class LaboratoriaTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('image')->disk('public'),
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('alias')->searchable(),
            TextColumn::make('chairmanLab.name')->label('Kepala Lab'),
            TextColumn::make('active')->badge()->formatStateUsing(fn (mixed $state): string => $state ? 'Aktif' : 'Nonaktif')
                ->color(fn (mixed $state): string => $state ? 'success' : 'danger'),
        ])->filters([
            TernaryFilter::make('active')->label('Aktif'),
        ])->recordActions([
            EditAction::make(), DeleteAction::make(),
        ])->toolbarActions([
            BulkActionGroup::make([DeleteBulkAction::make()]),
        ]);
    }
}
