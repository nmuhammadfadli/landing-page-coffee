<?php

namespace App\Filament\Resources\Products;

use App\Models\Product;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Actions;
use Filament\Tables\Filters;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Katalog Kopi';
    }

    public static function getNavigationIcon(): string | BackedEnum | null
    {
        return 'heroicon-o-shopping-bag';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Dasar')->schema([
                    Forms\Components\TextInput::make('name_id')->label('Nama (ID)')->required(),
                    Forms\Components\TextInput::make('name_en')->label('Nama (EN)'),
                    Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('origin_id')->label('Origin (ID)')->required(),
                    Forms\Components\TextInput::make('origin_en')->label('Origin (EN)'),
                    Forms\Components\Select::make('roast_level')
                        ->options(['Light' => 'Light', 'Medium' => 'Medium', 'Dark' => 'Dark'])->required(),
                    Forms\Components\Select::make('stock_status')
                        ->options(['Available' => 'Available', 'Limited' => 'Limited', 'Sold Out' => 'Sold Out']),
                    Forms\Components\TextInput::make('price')->numeric()->prefix('Rp')->required(),
                    Forms\Components\Toggle::make('is_featured')->label('Featured'),
                    Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                ])->columns(2),

                Section::make('Deskripsi')->schema([
                    Forms\Components\Textarea::make('description_id')->label('Deskripsi (ID)')->required()->columnSpanFull(),
                    Forms\Components\Textarea::make('description_en')->label('Deskripsi (EN)')->columnSpanFull(),
                ]),

                Section::make('Data Teknis')->schema([
                    Forms\Components\TextInput::make('process_id')->label('Proses (ID)'),
                    Forms\Components\TextInput::make('process_en')->label('Proses (EN)'),
                    Forms\Components\TextInput::make('elevation'),
                    Forms\Components\TextInput::make('sca_score')->numeric()->step(0.1)->suffix('SCA'),
                    Forms\Components\TextInput::make('moisture'),
                    Forms\Components\TextInput::make('fob_price_range'),
                    Forms\Components\TextInput::make('image')->required(),
                    Forms\Components\TextInput::make('rating')->numeric()->step(0.1)->default(0),
                ])->columns(2),

                Section::make('Informasi Ekspor')->schema([
                    Forms\Components\TextInput::make('available_lots_id')->label('Lot Tersedia (ID)'),
                    Forms\Components\TextInput::make('available_lots_en')->label('Lot Tersedia (EN)'),
                    Forms\Components\TextInput::make('defect_count_id')->label('Cacat (ID)'),
                    Forms\Components\TextInput::make('defect_count_en')->label('Cacat (EN)'),
                    Forms\Components\TextInput::make('bag_type_id')->label('Kemasan (ID)'),
                    Forms\Components\TextInput::make('bag_type_en')->label('Kemasan (EN)'),
                ])->columns(2),

                Section::make('Catatan Rasa')->schema([
                    Repeater::make('flavorNotes')
                        ->relationship()
                        ->schema([
                            Forms\Components\TextInput::make('note')->required(),
                            Forms\Components\Select::make('locale')
                                ->options(['id' => 'Indonesia', 'en' => 'English'])->required(),
                            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                        ])
                        ->columns(3)
                        ->defaultItems(0)
                        ->addActionLabel('Tambah Catatan Rasa'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_id')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('origin_id')->label('Origin')->searchable(),
                Tables\Columns\TextColumn::make('roast_level')->badge(),
                Tables\Columns\TextColumn::make('price')->money('IDR'),
                Tables\Columns\TextColumn::make('stock_status')->badge()->color(fn(string $state): string => match ($state) {
                    'Available' => 'success',
                    'Limited' => 'warning',
                    'Sold Out' => 'danger',
                }),
                Tables\Columns\IconColumn::make('is_featured')->boolean()->sortable(),
                Tables\Columns\TextColumn::make('sca_score')->sortable(),
            ])
            ->filters([
                Filters\SelectFilter::make('roast_level')
                    ->options(['Light' => 'Light', 'Medium' => 'Medium', 'Dark' => 'Dark']),
                Filters\SelectFilter::make('stock_status')
                    ->options(['Available' => 'Available', 'Limited' => 'Limited', 'Sold Out' => 'Sold Out']),
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
            'index' => Pages\ManageProducts::route('/'),
        ];
    }
}
