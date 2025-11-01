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
            Toggle::make('is_hero')
                ->label('Hero')
                ->helperText('Tandai foto ini untuk muncul di bagian About')
                ->inline(false),

            Toggle::make('is_achievement')
                ->label('Prestasi')
                ->helperText('Tandai foto ini sebagai foto prestasi')
                ->inline(false),
        ]);
    }
}
