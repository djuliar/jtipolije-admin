<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class ContentStats extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'full';

    protected int|array|null $columns = 4;

    protected function getStats(): array
    {
        return [
            Stat::make('Articles', Article::query()->count()),
            Stat::make('Pages', DB::table('pages')->whereNull('deleted_at')->count()),
            Stat::make('Program Studi', DB::table('prodi')->count()),
            Stat::make('Laboratorium', DB::table('laboratorium')->count()),
            Stat::make('Slider', DB::table('sliders')->count()),
            Stat::make('Dosen', DB::table('dosen')->count()),
            Stat::make('Teknisi', DB::table('teknisi')->count()),
            Stat::make('Staf', DB::table('administrasi')->count()),
        ];
    }
}
