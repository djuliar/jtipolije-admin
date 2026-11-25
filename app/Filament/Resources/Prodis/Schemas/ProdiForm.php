<?php

namespace App\Filament\Resources\Prodis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProdiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(100),
                TextInput::make('alias')->maxLength(20),
                RichEditor::make('description')->columnSpanFull(),
                Select::make('coordinator')->label('ID Koordinator')->relationship('coordinatorDosen', 'name')->searchable()->preload(),
                Select::make('admin')->label('ID Admin')->relationship('adminAdministrasi', 'name')->searchable()->preload(),
                FileUpload::make('image')->disk('public')->directory('prodi'),
                FileUpload::make('profil_lulusan')->disk('public')->directory('prodi/files'),
                FileUpload::make('struktur_kurikulum')->disk('public')->directory('prodi/files'),
                FileUpload::make('mata_kuliah')->disk('public')->directory('prodi/files'),
                FileUpload::make('akreditasi')->disk('public')->directory('prodi/files'),
                FileUpload::make('ppm_cpl')->disk('public')->directory('prodi/files'),
                FileUpload::make('peta_kurikulum')->disk('public')->directory('prodi/files'),
                Select::make('active')->options([1 => 'Aktif', 0 => 'Nonaktif'])->default(1)->required(),
                Select::make('additional_info')->options([1 => 'Aktif', 0 => 'Nonaktif'])->default(0)->required(),
            ]);
    }
}
