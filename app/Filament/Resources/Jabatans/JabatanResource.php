<?php

namespace App\Filament\Resources\Jabatans;

use App\Models\Jabatan;
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
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class JabatanResource extends Resource
{
    protected static ?string $model = Jabatan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static string|\UnitEnum|null $navigationGroup = 'Data Master';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Jabatan Fungsional';

    protected static ?string $modelLabel = 'Jabatan Fungsional';

    protected static ?string $pluralModelLabel = 'Jabatan Fungsional';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required()->maxLength(50),
            Select::make('active')->options([1 => 'Aktif', 0 => 'Nonaktif'])->default(1)->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('active')->badge()->formatStateUsing(fn (mixed $state): string => $state ? 'Aktif' : 'Nonaktif')
                ->color(fn (mixed $state): string => $state ? 'success' : 'danger'),
        ])->filters([
            TernaryFilter::make('active')->label('Aktif'),
        ])->recordActions([
            EditAction::make(), DeleteAction::make(),
        ])->toolbarActions([
            BulkActionGroup::make([DeleteBulkAction::make()]),
        ]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ManageJabatans::route('/')];
    }
}
