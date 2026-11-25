<?php

namespace App\Filament\Resources\LabDokumens\Pages;

use App\Filament\Resources\LabDokumens\LabDokumenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageLabDokumens extends ManageRecords
{
    protected static string $resource = LabDokumenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
