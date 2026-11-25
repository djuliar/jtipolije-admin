<?php

namespace App\Filament\Resources\LabProduks\Pages;

use App\Filament\Resources\LabProduks\LabProdukResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageLabProduks extends ManageRecords
{
    protected static string $resource = LabProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
