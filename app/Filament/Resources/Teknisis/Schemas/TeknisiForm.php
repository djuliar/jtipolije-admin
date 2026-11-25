<?php

namespace App\Filament\Resources\Teknisis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeknisiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->maxLength(150)->required(),
                TextInput::make('nip')->maxLength(25),
                Select::make('lab')->label('ID Lab')->relationship('laboratorium', 'name')->searchable()->preload(),
                TextInput::make('tempat_lahir')->maxLength(50),
                DatePicker::make('tanggal_lahir'),
                RichEditor::make('alamat'),
                TextInput::make('telepon'),
                TextInput::make('email'),
                TextInput::make('jabatan')->numeric(),
                TextInput::make('status')->numeric(),
                TextInput::make('golongan')->maxLength(50),
                FileUpload::make('image')->disk('public')->directory('teknisi'),
                Select::make('active')->options([1 => 'Aktif', 0 => 'Nonaktif'])->default(1),
                Select::make('show_ttl')->options([1 => 'Tampilkan', 0 => 'Sembunyikan'])->default(1),
                Select::make('show_alamat')->options([1 => 'Tampilkan', 0 => 'Sembunyikan'])->default(1),
                Select::make('show_telepon')->options([1 => 'Tampilkan', 0 => 'Sembunyikan'])->default(1),
                Select::make('show_email')->options([1 => 'Tampilkan', 0 => 'Sembunyikan'])->default(1),
            ]);
    }
}
