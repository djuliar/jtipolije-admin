<?php

namespace App\Filament\Resources\Administrasis\Pages;

use App\Filament\Resources\Administrasis\AdministrasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdministrasis extends ListRecords
{
    protected static string $resource = AdministrasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
