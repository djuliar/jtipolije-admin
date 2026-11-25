<?php

namespace App\Filament\Resources\OtherCivitas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class OtherCivitasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort(function (Builder $query): Builder {
                return $query
                    ->orderBy('active', 'desc')
                    ->orderBy('lft', 'asc');
            })
            ->reorderable('lft')
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('nip')->label('NIP')->searchable(),
                ImageColumn::make('image')->disk('public'),
                TextColumn::make('jabatan')->searchable(),
                TextColumn::make('active')->badge()->formatStateUsing(fn (mixed $state): string => $state ? 'Aktif' : 'Nonaktif')
                    ->color(fn (mixed $state): string => $state ? 'success' : 'danger'),
            ])
            ->filters([
                TernaryFilter::make('active')->label('Aktif'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
