<?php

namespace Tests\Feature;

use App\Filament\Resources\Categories\Pages\ManageCategories;
use App\Filament\Resources\Tags\Pages\ManageTags;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CategoryTagCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_category_and_tag(): void
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(ManageCategories::class)
            ->callAction('create', data: ['name' => 'News', 'slug' => 'news', 'active' => 1])
            ->assertHasNoActionErrors();
        Livewire::test(ManageTags::class)
            ->callAction('create', data: ['name' => 'Laravel', 'slug' => 'laravel'])
            ->assertHasNoActionErrors();

        $this->assertDatabaseHas('categories', ['slug' => 'news']);
        $this->assertDatabaseHas('tags', ['slug' => 'laravel']);
    }
}
