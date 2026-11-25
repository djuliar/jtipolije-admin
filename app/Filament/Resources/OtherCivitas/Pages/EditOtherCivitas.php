<?php

namespace App\Filament\Resources\OtherCivitas\Pages;

use App\Filament\Resources\OtherCivitas\OtherCivitasResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOtherCivitas extends EditRecord
{
    protected static string $resource = OtherCivitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
