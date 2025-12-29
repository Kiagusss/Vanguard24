<?php

namespace App\Filament\Resources\BirthdayResource\Pages;

use App\Filament\Resources\BirthdayResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBirthday extends CreateRecord
{
    protected static string $resource = BirthdayResource::class;
}
