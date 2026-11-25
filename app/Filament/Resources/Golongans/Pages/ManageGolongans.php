<?php

namespace App\Filament\Resources\Golongans\Pages;

use App\Filament\Resources\Golongans\GolonganResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageGolongans extends ManageRecords
{
    protected static string $resource = GolonganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
