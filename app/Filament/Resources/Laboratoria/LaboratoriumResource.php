<?php

namespace App\Filament\Resources\Laboratoria;

use App\Filament\Resources\Laboratoria\Pages\CreateLaboratorium;
use App\Filament\Resources\Laboratoria\Pages\EditLaboratorium;
use App\Filament\Resources\Laboratoria\Pages\ListLaboratoria;
use App\Filament\Resources\Laboratoria\Schemas\LaboratoriumForm;
use App\Filament\Resources\Laboratoria\Tables\LaboratoriaTable;
use App\Models\Laboratorium;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LaboratoriumResource extends Resource
{
    protected static ?string $model = Laboratorium::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBeaker;

    protected static string|\UnitEnum|null $navigationGroup = 'Laboratorium';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Laboratorium';

    protected static ?string $modelLabel = 'Laboratorium';

    protected static ?string $pluralModelLabel = 'Laboratorium';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return LaboratoriumForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LaboratoriaTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLaboratoria::route('/'),
            'create' => CreateLaboratorium::route('/create'),
            'edit' => EditLaboratorium::route('/{record}/edit'),
        ];
    }
}
