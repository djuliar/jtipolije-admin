<?php

namespace App\Filament\Resources\Statuses;

use App\Models\Status;
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

class StatusResource extends Resource
{
    protected static ?string $model = Status::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedIdentification;

    protected static string|\UnitEnum|null $navigationGroup = 'Data Master';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Status Kepegawaian';

    protected static ?string $modelLabel = 'Status Kepegawaian';

    protected static ?string $pluralModelLabel = 'Status Kepegawaian';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required()->maxLength(10),
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
        return ['index' => Pages\ManageStatuses::route('/')];
    }
}
