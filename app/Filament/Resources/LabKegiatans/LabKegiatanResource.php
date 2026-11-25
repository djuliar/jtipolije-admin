<?php

namespace App\Filament\Resources\LabKegiatans;

use App\Filament\Resources\LabKegiatans\Pages\ManageLabKegiatans;
use App\Models\LabKegiatan;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LabKegiatanResource extends Resource
{
    protected static ?string $model = LabKegiatan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static string|\UnitEnum|null $navigationGroup = 'Laboratorium';

    protected static ?string $navigationParentItem = 'Laboratorium';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationLabel = 'Data Kegiatan';

    protected static ?string $modelLabel = 'Data Kegiatan';

    protected static ?string $pluralModelLabel = 'Data Kegiatan';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->maxLength(150)->required(),
            RichEditor::make('description')->columnSpanFull(),
            DatePicker::make('date'),
            FileUpload::make('image')->disk('public')->directory('laboratorium/kegiatan')->visibility('public'),
            Select::make('lab_id')->relationship('laboratorium', 'name')->searchable()->preload()->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('date')->date()->sortable(),
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
        return ['index' => ManageLabKegiatans::route('/')];
    }
}
