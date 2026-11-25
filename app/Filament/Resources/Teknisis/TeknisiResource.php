<?php

namespace App\Filament\Resources\Teknisis;

use App\Filament\Resources\Teknisis\Pages\CreateTeknisi;
use App\Filament\Resources\Teknisis\Pages\EditTeknisi;
use App\Filament\Resources\Teknisis\Pages\ListTeknisis;
use App\Filament\Resources\Teknisis\Schemas\TeknisiForm;
use App\Filament\Resources\Teknisis\Tables\TeknisisTable;
use App\Models\Teknisi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TeknisiResource extends Resource
{
    protected static ?string $model = Teknisi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static string|\UnitEnum|null $navigationGroup = 'Civitas';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Teknisi';

    protected static ?string $modelLabel = 'Teknisi';

    protected static ?string $pluralModelLabel = 'Teknisi';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TeknisiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TeknisisTable::configure($table);
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
            'index' => ListTeknisis::route('/'),
            'create' => CreateTeknisi::route('/create'),
            'edit' => EditTeknisi::route('/{record}/edit'),
        ];
    }
}
