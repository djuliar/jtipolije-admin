<?php

namespace App\Filament\Resources\Sliders\Tables;

use App\Models\Slider;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class SlidersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('lft')
            ->reorderable('lft')
            ->columns([
                TextColumn::make('title')->limit(50)->searchable()->sortable(),
                ImageColumn::make('image')->disk('public')->size(64),
                TextColumn::make('image_position')->label('Image Position')->badge(),
                TextColumn::make('button_text')->label('Button Text')->badge()->color('primary'),
                TextColumn::make('button_link')->label('Button Link')->url(fn (Slider $record): ?string => $record->button_link ?: null, shouldOpenInNewTab: true)->limit(40)->color('primary'),
                TextColumn::make('target')->badge()->formatStateUsing(fn (mixed $state): string => $state ? 'New Tab' : 'Same Page')->color(fn (mixed $state): string => $state ? 'primary' : 'gray'),
                TextColumn::make('active')->badge()->formatStateUsing(fn (mixed $state): string => $state ? 'Active' : 'Inactive')->color(fn (mixed $state): string => $state ? 'success' : 'danger'),
            ])
            ->filters([
                TernaryFilter::make('active')->label('Active'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
