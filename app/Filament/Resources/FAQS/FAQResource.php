<?php

namespace App\Filament\Resources\FAQS;

use App\Models\FAQ;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class FAQResource extends Resource
{
    protected static ?string $model = FAQ::class;

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Konten';
    }

    public static function getNavigationIcon(): string | BackedEnum | null
    {
        return 'heroicon-o-question-mark-circle';
    }

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Textarea::make('question_id')->label('Pertanyaan (ID)')->required(),
                Forms\Components\Textarea::make('question_en')->label('Pertanyaan (EN)'),
                Forms\Components\Textarea::make('answer_id')->label('Jawaban (ID)')->required()->columnSpanFull(),
                Forms\Components\Textarea::make('answer_en')->label('Jawaban (EN)')->columnSpanFull(),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question_id')->label('Pertanyaan')->searchable()->wrap()->limit(60),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageFAQS::route('/'),
        ];
    }
}
