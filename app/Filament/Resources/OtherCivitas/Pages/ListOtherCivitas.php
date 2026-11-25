<?php

namespace App\Filament\Resources\OtherCivitas\Pages;

use App\Filament\Resources\OtherCivitas\OtherCivitasResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOtherCivitas extends ListRecords
{
    protected static string $resource = OtherCivitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
