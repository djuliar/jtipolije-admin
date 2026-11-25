<?php

namespace App\Filament\Widgets;

use App\Models\Administrasi;
use App\Models\Article;
use App\Models\Dosen;
use App\Models\Laboratorium;
use App\Models\Page;
use App\Models\Prodi;
use App\Models\Teknisi;
use Filament\Support\Icons\Heroicon;
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
            Stat::make('Articles', Article::query()->where('active', 1)->count())->icon(Heroicon::OutlinedNewspaper),
            Stat::make('Pages', Page::query()->where('active', 1)->count())->icon(Heroicon::OutlinedDocumentText),
            Stat::make('Program Studi', Prodi::query()->where('active', 1)->count())->icon(Heroicon::OutlinedAcademicCap),
            Stat::make('Laboratorium', Laboratorium::query()->where('active', 1)->count())->icon(Heroicon::OutlinedBeaker),
            Stat::make('Dosen', Dosen::query()->where('active', 1)->count())->icon(Heroicon::OutlinedAcademicCap),
            Stat::make('Teknisi', Teknisi::query()->where('active', 1)->count())->icon(Heroicon::OutlinedWrenchScrewdriver),
            Stat::make('Staf', Administrasi::query()->where('active', 1)->count())->icon(Heroicon::OutlinedClipboardDocumentList),
            Stat::make('Slider', DB::table('sliders')->where('active', 1)->count())->icon(Heroicon::OutlinedPhoto),
        ];
    }
}
