<?php

namespace App\Filament\Resources\LabGaris\Pages;

use App\Filament\Resources\LabGaris\LabGarisResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageLabGarises extends ManageRecords
{
    protected static string $resource = LabGarisResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
