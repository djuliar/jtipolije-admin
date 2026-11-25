<?php

namespace App\Filament\Resources\LabInventaris;

use App\Filament\Resources\LabInventaris\Pages\ManageLabInventaris;
use App\Models\LabInventaris;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LabInventarisResource extends Resource
{
    protected static ?string $model = LabInventaris::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static string|\UnitEnum|null $navigationGroup = 'Laboratorium';

    protected static ?string $navigationParentItem = 'Laboratorium';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Data Inventaris';

    protected static ?string $modelLabel = 'Data Inventaris';

    protected static ?string $pluralModelLabel = 'Data Inventaris';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->maxLength(150)->required(),
            TextInput::make('quantity')->numeric()->minValue(0),
            Select::make('condition')->options([1 => 'Baik', 2 => 'Rusak Ringan', 3 => 'Rusak Berat']),
            Select::make('lab_id')->relationship('laboratorium', 'name')->searchable()->preload()->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('quantity'),
            TextColumn::make('condition')->badge()->formatStateUsing(fn (mixed $state): string => match ($state) {
                1 => 'Baik',
                2 => 'Rusak Ringan',
                3 => 'Rusak Berat',
                default => 'Tidak Diketahui',
            })->color(fn (mixed $state): string => match ($state) {
                1 => 'success',
                2 => 'warning',
                3 => 'danger',
                default => 'gray',
            }),
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
        return ['index' => ManageLabInventaris::route('/')];
    }
}
