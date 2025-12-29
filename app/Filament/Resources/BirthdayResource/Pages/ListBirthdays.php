<?php

namespace App\Filament\Resources\BirthdayResource\Pages;

use App\Filament\Resources\BirthdayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBirthdays extends ListRecords
{
    protected static string $resource = BirthdayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
