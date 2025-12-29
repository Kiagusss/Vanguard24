<?php

namespace App\Filament\Resources\BirthdayResource\Pages;

use App\Filament\Resources\BirthdayResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBirthday extends EditRecord
{
    protected static string $resource = BirthdayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
