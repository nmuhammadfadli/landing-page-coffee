<?php

namespace App\Filament\Resources\TimelineSteps;

use App\Models\TimelineStep;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class TimelineStepResource extends Resource
{
    protected static ?string $model = TimelineStep::class;

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Konten';
    }

    public static function getNavigationIcon(): string | BackedEnum | null
    {
        return 'heroicon-o-clock';
    }

    public static function getNavigationSort(): ?int
    {
        return 5;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('step_number')->numeric()->required(),
                Forms\Components\TextInput::make('title_id')->label('Judul (ID)')->required(),
                Forms\Components\TextInput::make('title_en')->label('Judul (EN)'),
                Forms\Components\TextInput::make('subtitle_id')->label('Subjudul (ID)')->required(),
                Forms\Components\TextInput::make('subtitle_en')->label('Subjudul (EN)'),
                Forms\Components\Textarea::make('description_id')->label('Deskripsi (ID)')->required(),
                Forms\Components\Textarea::make('description_en')->label('Deskripsi (EN)'),
                Forms\Components\TextInput::make('icon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('step_number')->sortable(),
                Tables\Columns\TextColumn::make('title_id')->label('Judul')->searchable(),
                Tables\Columns\TextColumn::make('icon'),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('step_number');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTimelineSteps::route('/'),
        ];
    }
}
