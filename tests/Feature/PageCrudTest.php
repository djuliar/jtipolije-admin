<?php

namespace Tests\Feature;

use App\Filament\Resources\Pages\Pages\CreatePage;
use App\Filament\Resources\Pages\Pages\EditPage;
use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PageCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_and_edit_a_page(): void
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(CreatePage::class)
            ->fillForm([
                'name' => 'About us',
                'title' => 'About JTI',
                'slug' => 'about-jti',
                'template' => 'about_us',
                'content' => '<p>About</p>',
                'active' => 1,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $page = Page::query()->where('slug', 'about-jti')->firstOrFail();
        $this->assertSame('about_us', $page->template);
        $this->assertSame('<p>About</p>', $page->content);

        Livewire::test(EditPage::class, ['record' => $page->getRouteKey()])
            ->fillForm(['title' => 'About JTI Updated'])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('pages', ['id' => $page->id, 'title' => 'About JTI Updated']);
    }
}
