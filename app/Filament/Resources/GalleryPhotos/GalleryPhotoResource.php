<?php

namespace App\Filament\Resources\GalleryPhotos;

use App\Models\GalleryPhoto;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class GalleryPhotoResource extends Resource
{
    protected static ?string $model = GalleryPhoto::class;

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Konten';
    }

    public static function getNavigationIcon(): string | BackedEnum | null
    {
        return 'heroicon-o-photo';
    }

    public static function getNavigationSort(): ?int
    {
        return 6;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('image')->required(),
                Forms\Components\TextInput::make('title_id')->label('Judul (ID)')->required(),
                Forms\Components\TextInput::make('title_en')->label('Judul (EN)'),
                Forms\Components\Textarea::make('desc_id')->label('Deskripsi (ID)'),
                Forms\Components\Textarea::make('desc_en')->label('Deskripsi (EN)'),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->circular()->size(60),
                Tables\Columns\TextColumn::make('title_id')->label('Judul')->searchable(),
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
            'index' => Pages\ManageGalleryPhotos::route('/'),
        ];
    }
}
