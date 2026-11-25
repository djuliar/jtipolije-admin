<?php

namespace App\Filament\Resources\Dosens\Tables;

use App\Models\Prodi;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DosensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort(function (Builder $query): Builder {
                return $query
                    ->orderBy('active', 'desc')
                    ->orderBy('prodi', 'asc')
                    ->orderBy('lft', 'asc');
            })
            ->reorderable('lft')
            ->columns([
                ImageColumn::make('image')->disk('public'),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('nip')->searchable(),
                TextColumn::make('nidn')->searchable(),
                TextColumn::make('programStudi.name')->label('Program Studi')->sortable(),
                TextColumn::make('active')->sortable()->badge()->formatStateUsing(fn (mixed $state): string => $state ? 'Aktif' : 'Nonaktif')
                    ->color(fn (mixed $state): string => $state ? 'success' : 'danger'),
            ])
            ->filters([
                SelectFilter::make('prodi')
                    ->label('Program Studi')
                    ->searchable()
                    ->preload()
                    ->options(fn (): array => Prodi::query()->where('active', 1)->orderBy('id')->pluck('name', 'id')->all())
                    ->query(fn (Builder $query, array $data): Builder => $query->when(
                        $data['value'] ?? null,
                        fn (Builder $query, int|string $prodiId): Builder => $query->where('prodi', $prodiId),
                    )),
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
