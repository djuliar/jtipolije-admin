<?php

namespace App\Filament\Resources\Laboratoria\Schemas;

use App\Models\Teknisi;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LaboratoriumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->maxLength(150)->required(),
            TextInput::make('alias')->maxLength(20),
            RichEditor::make('description')->columnSpanFull(),
            Select::make('chairman')->relationship('chairmanLab', 'name')->searchable()->preload(),
            FileUpload::make('image')->disk('public')->directory('laboratorium')->visibility('public'),
            TextInput::make('phone'),
            TextInput::make('email')->email(),
            TextInput::make('website')->url(),
            Select::make('active')->options([1 => 'Aktif', 0 => 'Nonaktif'])->default(1)->required(),
            TextInput::make('address')->columnSpanFull(),
            Repeater::make('additional')->schema([
                Select::make('teknisi')->options(fn (): array => Teknisi::query()->orderBy('name')->pluck('name', 'id')->all())->searchable()->required(),
            ])->columnSpanFull(),
        ]);
    }
}
