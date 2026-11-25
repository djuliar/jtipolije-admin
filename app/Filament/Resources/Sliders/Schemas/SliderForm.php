<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->schema([
                    TextInput::make('title')->required()->maxLength(255)->columnSpanFull(),
                    Grid::make(5)->schema([
                        TextInput::make('button_text')->maxLength(50),
                        TextInput::make('button_link')->url()->maxLength(2048),
                        Select::make('image_position')->options([
                            'center center' => 'Center Center',
                            'center top' => 'Center Top',
                            'center bottom' => 'Center Bottom',
                            'left center' => 'Left Center',
                            'right center' => 'Right Center',
                        ]),
                        Select::make('target')->options([0 => 'Same Page', 1 => 'New Tab'])->default(0)->required(),
                        Select::make('active')->options([1 => 'Active', 0 => 'Inactive'])->default(1)->required(),
                    ]),
                    Grid::make(2)->schema([
                        RichEditor::make('description'),
                        FileUpload::make('image')->image()->disk('public')->directory('sliders')->visibility('public'),
                    ]),
                ]),
            ]);
    }
}
