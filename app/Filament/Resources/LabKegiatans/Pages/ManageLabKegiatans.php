<?php

namespace App\Filament\Resources\LabKegiatans\Pages;

use App\Filament\Resources\LabKegiatans\LabKegiatanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageLabKegiatans extends ManageRecords
{
    protected static string $resource = LabKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
