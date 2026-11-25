<?php

namespace App\Filament\Resources\Teknisis\Pages;

use App\Filament\Resources\Teknisis\TeknisiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTeknisi extends EditRecord
{
    protected static string $resource = TeknisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
