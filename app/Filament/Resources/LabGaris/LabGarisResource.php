<?php

namespace App\Filament\Resources\LabGaris;

use App\Filament\Resources\LabGaris\Pages\ManageLabGarises;
use App\Models\LabGaris as LabGarisModel;
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

class LabGarisResource extends Resource
{
    protected static ?string $model = LabGarisModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Laboratorium';

    protected static ?string $navigationParentItem = 'Laboratorium';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Data Garis';

    protected static ?string $modelLabel = 'Data Garis';

    protected static ?string $pluralModelLabel = 'Data Garis';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->maxLength(150)->required(),
            Select::make('leader')->label('Leader')->relationship('leaderDosen', 'name')->searchable()->preload(),
            RichEditor::make('team')->columnSpanFull(),
            RichEditor::make('description')->columnSpanFull(),
            Select::make('lab_id')->relationship('laboratorium', 'name')->searchable()->preload()->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('leaderDosen.name')->label('Leader'),
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
        return ['index' => ManageLabGarises::route('/')];
    }
}
