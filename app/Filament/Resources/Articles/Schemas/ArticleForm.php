<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Enums\ArticleActive;
use App\Enums\ArticleStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->maxLength(255)->live(onBlur: true)
                    ->afterStateUpdated(fn (string $state, Set $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required()->maxLength(255)->unique(ignoreRecord: true),
                Select::make('category_id')->relationship('category', 'name')->searchable()->preload()->required(),
                Select::make('tags')->relationship('tags', 'name')->multiple()->searchable()->preload(),
                DateTimePicker::make('date')->default(now())->required(),
                RichEditor::make('content')->required()->columnSpanFull(),
                FileUpload::make('image')->disk('public')->directory('articles'),
                Select::make('status')->options(ArticleStatus::class)->default(ArticleStatus::Draft)->required(),
                Select::make('featured')->options([0 => 'Unfeatured', 1 => 'Featured'])->default(0)->required(),
                Select::make('editable')->options([0 => 'No', 1 => 'Yes'])->default(1)->required(),
                Select::make('active')->options(ArticleActive::class)->default(ArticleActive::Aktif)->required(),
                TextInput::make('meta_description')->maxLength(1000),
                TextInput::make('meta_author')->maxLength(255),
                TextInput::make('meta_keyword')->placeholder('Pisahkan dengan koma')->columnSpanFull(),
                TextInput::make('og_title')->maxLength(255),
                TextInput::make('og_description')->maxLength(1000),
                FileUpload::make('og_image')->disk('public')->directory('articles/og'),
            ]);
    }
}
