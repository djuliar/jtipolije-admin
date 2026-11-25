<?php

namespace App\Filament\Resources\LabInventaris\Pages;

use App\Filament\Resources\LabInventaris\LabInventarisResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageLabInventaris extends ManageRecords
{
    protected static string $resource = LabInventarisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
