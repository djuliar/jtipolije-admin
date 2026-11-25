<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\ContentStats;
use App\Filament\Widgets\LatestArticles;
use App\Filament\Widgets\MostReadArticles;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            ContentStats::class,
            LatestArticles::class,
            MostReadArticles::class,
        ];
    }

    public function getColumns(): int|array
    {
        return 2;
    }
}
