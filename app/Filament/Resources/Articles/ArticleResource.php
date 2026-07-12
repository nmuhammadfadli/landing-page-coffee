<?php

namespace App\Filament\Resources\Articles;

use App\Models\Article;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Konten';
    }

    public static function getNavigationIcon(): string | BackedEnum | null
    {
        return 'heroicon-o-newspaper';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Artikel')->schema([
                    Forms\Components\TextInput::make('title_id')->label('Judul (ID)')->required(),
                    Forms\Components\TextInput::make('title_en')->label('Judul (EN)'),
                    Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('category_id')->label('Kategori (ID)')->required(),
                    Forms\Components\TextInput::make('category_en')->label('Kategori (EN)'),
                    Forms\Components\DatePicker::make('date_published')->required(),
                    Forms\Components\TextInput::make('read_time_id')->label('Waktu Baca (ID)'),
                    Forms\Components\TextInput::make('read_time_en')->label('Waktu Baca (EN)'),
                    Forms\Components\TextInput::make('image')->required(),
                    Forms\Components\Toggle::make('is_published')->default(true),
                ])->columns(2),

                Section::make('Konten')->schema([
                    Forms\Components\Textarea::make('summary_id')->label('Ringkasan (ID)')->required()->columnSpanFull(),
                    Forms\Components\Textarea::make('summary_en')->label('Ringkasan (EN)')->columnSpanFull(),
                    Forms\Components\Textarea::make('body_intro_id')->label('Intro (ID)')->columnSpanFull(),
                    Forms\Components\Textarea::make('body_intro_en')->label('Intro (EN)')->columnSpanFull(),
                    Forms\Components\RichEditor::make('body_p1_id')->label('Paragraf 1 (ID)')->columnSpanFull(),
                    Forms\Components\RichEditor::make('body_p1_en')->label('Paragraf 1 (EN)')->columnSpanFull(),
                    Forms\Components\RichEditor::make('body_p2_id')->label('Paragraf 2 (ID)')->columnSpanFull(),
                    Forms\Components\RichEditor::make('body_p2_en')->label('Paragraf 2 (EN)')->columnSpanFull(),
                    Forms\Components\RichEditor::make('body_p3_id')->label('Paragraf 3 (ID)')->columnSpanFull(),
                    Forms\Components\RichEditor::make('body_p3_en')->label('Paragraf 3 (EN)')->columnSpanFull(),
                    Forms\Components\Textarea::make('pull_quote_id')->label('Kutipan (ID)')->columnSpanFull(),
                    Forms\Components\Textarea::make('pull_quote_en')->label('Kutipan (EN)')->columnSpanFull(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_id')->label('Judul')->searchable()->sortable()->wrap(),
                Tables\Columns\TextColumn::make('category_id')->label('Kategori')->searchable(),
                Tables\Columns\TextColumn::make('date_published')->date()->sortable(),
                Tables\Columns\TextColumn::make('read_time_id')->label('Waktu Baca'),
                Tables\Columns\IconColumn::make('is_published')->boolean()->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_published')->label('Published')->query(fn($q) => $q->where('is_published', true)),
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
            'index' => Pages\ManageArticles::route('/'),
        ];
    }
}
