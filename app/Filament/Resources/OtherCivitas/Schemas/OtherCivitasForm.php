<?php

namespace App\Filament\Resources\OtherCivitas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OtherCivitasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->maxLength(150)->required(),
                TextInput::make('nip')->maxLength(25),
                TextInput::make('tempat_lahir')->maxLength(50),
                DatePicker::make('tanggal_lahir'),
                RichEditor::make('alamat')->columnSpanFull(),
                TextInput::make('telepon'),
                TextInput::make('email')->email(),
                TextInput::make('jabatan')->maxLength(50),
                TextInput::make('status')->numeric(),
                TextInput::make('golongan')->maxLength(50),
                FileUpload::make('image')->disk('public')->directory('other-civitas')->visibility('public'),
                Select::make('active')->options([1 => 'Aktif', 0 => 'Nonaktif'])->default(1),
                Select::make('show_ttl')->options([1 => 'Tampilkan', 0 => 'Sembunyikan'])->default(1),
                Select::make('show_alamat')->options([1 => 'Tampilkan', 0 => 'Sembunyikan'])->default(1),
                Select::make('show_telepon')->options([1 => 'Tampilkan', 0 => 'Sembunyikan'])->default(1),
                Select::make('show_email')->options([1 => 'Tampilkan', 0 => 'Sembunyikan'])->default(1),
            ]);
    }
}
