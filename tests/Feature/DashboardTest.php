<?php

namespace Tests\Feature;

use App\Filament\Pages\Dashboard;
use App\Filament\Widgets\ContentStats;
use App\Filament\Widgets\LatestArticles;
use App\Filament\Widgets\MostReadArticles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_shows_content_counts_and_article_tables(): void
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Dashboard::class)
            ->assertSeeLivewire(ContentStats::class)
            ->assertSeeLivewire(LatestArticles::class)
            ->assertSeeLivewire(MostReadArticles::class);
    }
}
