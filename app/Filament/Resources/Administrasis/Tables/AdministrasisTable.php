<?php

namespace App\Filament\Resources\Administrasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AdministrasisTable
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
                ImageColumn::make('image')->disk('public'),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('nip')->searchable(),
                TextColumn::make('programStudi.name')->label('Program Studi'),
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
