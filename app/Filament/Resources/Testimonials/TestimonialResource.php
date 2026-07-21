<?php

namespace App\Filament\Resources\Testimonials;

use App\Models\Testimonial;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Konten';
    }

    public static function getNavigationIcon(): string | BackedEnum | null
    {
        return 'heroicon-o-chat-bubble-left-ellipsis';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('role_id')->label('Role (ID)')->required(),
                Forms\Components\TextInput::make('role_en')->label('Role (EN)'),
                Forms\Components\TextInput::make('avatar'),
                Forms\Components\Select::make('rating')->options([1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5])->default(5),
                Forms\Components\Textarea::make('quote_id')->label('Quote (ID)')->required()->columnSpanFull(),
                Forms\Components\Textarea::make('quote_en')->label('Quote (EN)')->columnSpanFull(),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('role_id')->label('Role')->searchable(),
                Tables\Columns\TextColumn::make('rating'),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
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
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTestimonials::route('/'),
        ];
    }
}
