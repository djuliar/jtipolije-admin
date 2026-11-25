<?php

namespace App\Filament\Resources\LabDokumens;

use App\Filament\Resources\LabDokumens\Pages\ManageLabDokumens;
use App\Models\LabDokumen;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LabDokumenResource extends Resource
{
    protected static ?string $model = LabDokumen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|\UnitEnum|null $navigationGroup = 'Laboratorium';

    protected static ?string $navigationParentItem = 'Laboratorium';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Data Dokumen';

    protected static ?string $modelLabel = 'Data Dokumen';

    protected static ?string $pluralModelLabel = 'Data Dokumen';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('number')->maxLength(50),
            TextInput::make('name')->maxLength(100)->required(),
            TextInput::make('link')->url(),
            FileUpload::make('file')->disk('public')->directory('laboratorium/dokumen')->visibility('public'),
            Select::make('lab_id')->relationship('laboratorium', 'name')->searchable()->preload()->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('number')->searchable(),
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
        return ['index' => ManageLabDokumens::route('/')];
    }
}
