<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ArticleStatus: int implements HasColor, HasLabel
{
    case Draft = 0;
    case Publish = 1;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Publish => 'Publish',
            self::Draft => 'Draft',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Publish => 'info',
            self::Draft => 'gray',
        };
    }
}
