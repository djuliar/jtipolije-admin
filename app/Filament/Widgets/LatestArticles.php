<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestArticles extends TableWidget
{
    protected int|string|array $columnSpan = 1;

    protected int|array|null $columns = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Article::query())
            ->columns([
                TextColumn::make('title')->label('Judul')->limit(50),
                TextColumn::make('status')->label('Status')->badge(),
                TextColumn::make('active')->label('Status Aktif')->badge(),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([5, 10, 25, 50])
            ->defaultPaginationPageOption(5)
            ->heading('Postingan Terbaru');
    }
}
