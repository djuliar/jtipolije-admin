<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ArticleActive: int implements HasColor, HasLabel
{
    case Nonaktif = 0;
    case Aktif = 1;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Aktif => 'Aktif',
            self::Nonaktif => 'Nonaktif',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Aktif => 'success',
            self::Nonaktif => 'danger',
        };
    }
}
