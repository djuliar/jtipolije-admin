<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\ChartWidget;

class AuthorArticlesChart extends ChartWidget
{
    protected ?string $heading = 'Author Article';

    protected function getData(): array
    {
        $authors = Article::query()
            ->join('users', 'articles.user_id', '=', 'users.id')
            ->selectRaw('users.name as author, COUNT(*) as total')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total')
            ->get();

        return [
            'datasets' => [[
                'data' => $authors->pluck('total')->all(),
                'backgroundColor' => ['#BD62B2', '#850039', '#F8C7B7', '#7827F8', '#A18BD8', '#4E4DBA', '#F59E0B', '#0EA5E9', '#10B981', '#EF4444'],
                'borderColor' => '#FFFFFF',
                'borderWidth' => 2,
            ]],
            'labels' => $authors->pluck('author')->all(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
