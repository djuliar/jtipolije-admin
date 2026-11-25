<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;

class YoutubeStream extends Widget
{
    protected string $view = 'filament.widgets.youtube-stream';

    protected int|string|array $columnSpan = 1;

    protected int|array|null $columns = 2;

    protected function getViewData(): array
    {
        $url = DB::table('biodata')->value('youtube_stream');
        $videoId = null;

        if (is_string($url) && preg_match('/(?:youtube\.com\/(?:embed\/|live\/|watch\?v=)|youtu\.be\/)([A-Za-z0-9_-]{11})/', $url, $matches)) {
            $videoId = $matches[1];
        }

        return ['videoId' => $videoId];
    }
}
