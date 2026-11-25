<?php

namespace App\Filament\Resources\OtherCivitas;

use App\Filament\Resources\OtherCivitas\Pages\CreateOtherCivitas;
use App\Filament\Resources\OtherCivitas\Pages\EditOtherCivitas;
use App\Filament\Resources\OtherCivitas\Pages\ListOtherCivitas;
use App\Filament\Resources\OtherCivitas\Schemas\OtherCivitasForm;
use App\Filament\Resources\OtherCivitas\Tables\OtherCivitasTable;
use App\Models\OtherCivitas;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OtherCivitasResource extends Resource
{
    protected static ?string $model = OtherCivitas::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static string|\UnitEnum|null $navigationGroup = 'Civitas';

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationLabel = 'Civitas Lainnya';

    protected static ?string $modelLabel = 'Civitas Lainnya';

    protected static ?string $pluralModelLabel = 'Civitas Lainnya';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return OtherCivitasForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OtherCivitasTable::configure($table);
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
            'index' => ListOtherCivitas::route('/'),
            'create' => CreateOtherCivitas::route('/create'),
            'edit' => EditOtherCivitas::route('/{record}/edit'),
        ];
    }
}
