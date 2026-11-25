<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class MostReadArticles extends TableWidget
{
    protected int|string|array $columnSpan = 'full';

    protected int|array|null $columns = 4;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Article::query())
            ->columns([
                TextColumn::make('read_count')->label('Jumlah Dibaca')->numeric()->sortable(),
                TextColumn::make('title')->label('Judul')->limit(100),
            ])
            ->defaultSort('read_count', 'desc')
            ->paginated([5, 10, 25, 50])
            ->heading('Artikel Paling Banyak Dibaca');
    }
}
