<?php

namespace App\Filament\Resources\BrewGuides;

use App\Models\BrewGuide;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class BrewGuideResource extends Resource
{
    protected static ?string $model = BrewGuide::class;

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Konten';
    }

    public static function getNavigationIcon(): string | BackedEnum | null
    {
        return 'heroicon-o-beaker';
    }

    public static function getNavigationSort(): ?int
    {
        return 7;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi')->schema([
                    Forms\Components\TextInput::make('name_id')->label('Nama (ID)')->required(),
                    Forms\Components\TextInput::make('name_en')->label('Nama (EN)'),
                    Forms\Components\TextInput::make('photo'),
                    Forms\Components\TextInput::make('ratio')->required(),
                    Forms\Components\TextInput::make('temperature')->required(),
                    Forms\Components\TextInput::make('time_id')->label('Waktu (ID)')->required(),
                    Forms\Components\TextInput::make('time_en')->label('Waktu (EN)'),
                    Forms\Components\TextInput::make('grind_size_id')->label('Grind Size (ID)')->required(),
                    Forms\Components\TextInput::make('grind_size_en')->label('Grind Size (EN)'),
                ])->columns(2),

                Section::make('Deskripsi')->schema([
                    Forms\Components\Textarea::make('description_id')->label('Deskripsi (ID)')->required()->columnSpanFull(),
                    Forms\Components\Textarea::make('description_en')->label('Deskripsi (EN)')->columnSpanFull(),
                ]),

                Section::make('Langkah-langkah')->schema([
                    Repeater::make('steps')
                        ->relationship()
                        ->schema([
                            Forms\Components\TextInput::make('step_number')->numeric()->required(),
                            Forms\Components\Textarea::make('step_id')->label('Langkah (ID)')->required(),
                            Forms\Components\Textarea::make('step_en')->label('Langkah (EN)'),
                        ])
                        ->columns(3)
                        ->defaultItems(0)
                        ->addActionLabel('Tambah Langkah'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_id')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('ratio'),
                Tables\Columns\TextColumn::make('temperature'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBrewGuides::route('/'),
        ];
    }
}
