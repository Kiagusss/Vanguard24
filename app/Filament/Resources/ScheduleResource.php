<?php

namespace App\Filament\Resources;

use App\Models\Schedule;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions;
use BackedEnum;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('course')
                ->required()
                ->maxLength(255)
                ->label('Course Name'),
            Forms\Components\TextInput::make('day')
                ->required()
                ->maxLength(255)
                ->label('Day'),
            Forms\Components\TextInput::make('time')
                ->required()
                ->maxLength(255)
                ->label('Time'),
            Forms\Components\TextInput::make('room')
                ->required()
                ->maxLength(255)
                ->label('Room'),
            Forms\Components\TextInput::make('class')
                ->required()
                ->maxLength(255)
                ->label('Class'),
            Forms\Components\TextInput::make('credits')
                ->required()
                ->numeric()
                ->label('Credits'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('day')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('room')
                    ->searchable(),
                Tables\Columns\TextColumn::make('class')
                    ->searchable(),
                Tables\Columns\TextColumn::make('credits')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('day')
                    ->options([
                        'Monday' => 'Monday',
                        'Tuesday' => 'Tuesday',
                        'Wednesday' => 'Wednesday',
                        'Thursday' => 'Thursday',
                        'Friday' => 'Friday',
                    ]),
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
            'index' => \App\Filament\Resources\ScheduleResource\Pages\ListSchedules::route('/'),
            'create' => \App\Filament\Resources\ScheduleResource\Pages\CreateSchedule::route('/create'),
            'edit' => \App\Filament\Resources\ScheduleResource\Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
