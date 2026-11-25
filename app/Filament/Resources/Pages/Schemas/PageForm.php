<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('title')->required()->maxLength(255)->live(onBlur: true)
                    ->afterStateUpdated(fn (string $state, Set $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required()->maxLength(255),
                Select::make('template')->options(['about_us' => 'About Us', 'services' => 'Services'])->searchable()->required(),
                RichEditor::make('content')->columnSpanFull(),
                FileUpload::make('image')->disk('public')->directory('pages'),
                TextInput::make('meta_keyword')->maxLength(1000),
                TextInput::make('meta_description')->maxLength(1000),
                Select::make('active')->options([1 => 'Aktif', 0 => 'Nonaktif'])->default(1)->required(),
            ]);
    }
}
