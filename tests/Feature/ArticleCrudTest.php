<?php

namespace Tests\Feature;

use App\Enums\ArticleActive;
use App\Enums\ArticleStatus;
use App\Filament\Resources\Articles\Pages\CreateArticle;
use App\Filament\Resources\Articles\Pages\EditArticle;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ArticleCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_article_with_category_tags_and_enums(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::query()->create(['name' => 'News', 'slug' => 'news']);
        $tag = Tag::query()->create(['name' => 'Laravel', 'slug' => 'laravel']);

        Livewire::test(CreateArticle::class)
            ->fillForm([
                'title' => 'Testing Article',
                'slug' => 'testing-article',
                'content' => '<p>Article content</p>',
                'category_id' => $category->id,
                'tags' => [$tag->id],
                'date' => now()->toDateTimeString(),
                'status' => ArticleStatus::Publish->value,
                'active' => ArticleActive::Aktif->value,
                'featured' => 0,
                'editable' => 1,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $article = Article::query()->where('slug', 'testing-article')->firstOrFail();
        $this->assertSame($user->id, $article->user_id);
        $this->assertTrue($article->tags->contains($tag));
        $this->assertSame(ArticleStatus::Publish, $article->status);
        $this->assertSame(ArticleActive::Aktif, $article->active);
    }

    public function test_admin_can_update_article_and_sync_tags(): void
    {
        $this->actingAs(User::factory()->create());
        $category = Category::query()->create(['name' => 'News', 'slug' => 'news']);
        $oldTag = Tag::query()->create(['name' => 'Old', 'slug' => 'old']);
        $newTag = Tag::query()->create(['name' => 'New', 'slug' => 'new']);
        $article = Article::query()->create([
            'title' => 'Old title',
            'slug' => 'old-title',
            'content' => 'Content',
            'category_id' => $category->id,
            'status' => ArticleStatus::Draft,
            'active' => ArticleActive::Nonaktif,
        ]);
        $article->tags()->attach($oldTag);

        Livewire::test(EditArticle::class, ['record' => $article->getRouteKey()])
            ->fillForm([
                'title' => 'Updated title',
                'slug' => 'updated-title',
                'content' => 'Updated content',
                'category_id' => $category->id,
                'tags' => [$newTag->id],
                'date' => now()->toDateTimeString(),
                'status' => ArticleStatus::Draft->value,
                'active' => ArticleActive::Nonaktif->value,
                'featured' => 0,
                'editable' => 1,
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $article->refresh();
        $this->assertSame('Updated title', $article->title);
        $this->assertEqualsCanonicalizing([$newTag->id], $article->tags->modelKeys());
    }
}
