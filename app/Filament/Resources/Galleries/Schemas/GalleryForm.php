<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255),

            Select::make('type')
                ->label('Tipe')
                ->options([
                    'photo' => 'Foto',
                    'video' => 'Video',
                ])
                ->required(),

            FileUpload::make('file')
                ->label('Media')
                ->required()
                ->disk('public')
                ->directory('galleries')
                ->visibility('public')
                ->imageEditor()
                ->previewable(true),
            

            Select::make('category')
                ->label('Kategori')
                ->options([
                    'prestasi' => 'Prestasi',
                    'about' => 'About Us',
                    'moments' => 'Our Moments',
                ])
                ->helperText('Prestasi: slider kartu prestasi, About Us: section about, Our Moments: gallery foto biasa')
                ->nullable()
                ->reactive(),

            Forms\Components\Textarea::make('description')
                ->label('Deskripsi About Us')
                ->helperText('Teks yang akan muncul di section About Us ketika foto ini aktif')
                ->rows(4)
                ->visible(fn(callable $get) => $get('category') === 'about'),

            Toggle::make('is_achievement')
                ->label('Prestasi (Legacy)')
                ->helperText('DEPRECATED: Gunakan field Kategori sebagai gantinya')
                ->inline(false)
                ->hidden(),
        ]);
    }
}
