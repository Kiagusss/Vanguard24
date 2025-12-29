<?php

namespace App\Filament\Resources;

use App\Models\Birthday;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions;
use BackedEnum;

class BirthdayResource extends Resource
{
    protected static ?string $model = Birthday::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-gift';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->label('Name'),
            Forms\Components\DatePicker::make('date')
                ->required()
                ->label('Birthday Date'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date('d M')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // none
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\BirthdayResource\Pages\ListBirthdays::route('/'),
            'create' => \App\Filament\Resources\BirthdayResource\Pages\CreateBirthday::route('/create'),
            'edit' => \App\Filament\Resources\BirthdayResource\Pages\EditBirthday::route('/{record}/edit'),
        ];
    }
}
