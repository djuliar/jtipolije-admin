<?php

namespace App\Filament\Resources\Articles\Tables;

use App\Enums\ArticleActive;
use App\Enums\ArticleStatus;
use App\Models\Article;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Judul')->searchable()->sortable()->limit(50),
                TextColumn::make('date')->date()->sortable(),
                ImageColumn::make('image')->disk('public'),
                TextColumn::make('status')->badge(),
                TextColumn::make('active')->label('Aktif')->badge(),
                TextColumn::make('category.name')->label('Kategori'),
                TextColumn::make('tags.name')->label('Tag')->listWithLineBreaks(),
                TextColumn::make('user.name')->label('Penulis')->state(fn (Article $record): ?string => $record->user?->name),
                TextColumn::make('read_count')->label('Dibaca')->numeric()->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('category')->relationship('category', 'name'),
                SelectFilter::make('tags')->relationship('tags', 'name'),
                SelectFilter::make('status')->options(ArticleStatus::class),
                SelectFilter::make('active')->options(ArticleActive::class),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
