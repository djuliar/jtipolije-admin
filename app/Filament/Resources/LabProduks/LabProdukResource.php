<?php

namespace App\Filament\Resources\LabProduks;

use App\Filament\Resources\LabProduks\Pages\ManageLabProduks;
use App\Models\LabProduk;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LabProdukResource extends Resource
{
    protected static ?string $model = LabProduk::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCube;

    protected static string|\UnitEnum|null $navigationGroup = 'Laboratorium';

    protected static ?string $navigationParentItem = 'Laboratorium';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationLabel = 'Data Produk';

    protected static ?string $modelLabel = 'Data Produk';

    protected static ?string $pluralModelLabel = 'Data Produk';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->maxLength(150)->required(),
            RichEditor::make('description')->columnSpanFull(),
            TextInput::make('category_id')->numeric(),
            TextInput::make('link')->url(),
            RichEditor::make('team')->columnSpanFull(),
            Select::make('lab_id')->relationship('laboratorium', 'name')->searchable()->preload()->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('link')->url()->limit(40),
            TextColumn::make('laboratorium.name')->label('Laboratorium'),
        ])->filters([
            SelectFilter::make('lab_id')->label('Laboratorium')->relationship('laboratorium', 'name')->preload()->searchable(),
        ])->recordActions([
            EditAction::make(), DeleteAction::make(),
        ])->toolbarActions([
            BulkActionGroup::make([DeleteBulkAction::make()]),
        ]);
    }

    public static function getPages(): array
    {
        return ['index' => ManageLabProduks::route('/')];
    }
}
