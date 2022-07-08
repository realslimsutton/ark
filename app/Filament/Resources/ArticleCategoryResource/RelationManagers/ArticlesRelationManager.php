<?php

namespace App\Filament\Resources\ArticleCategoryResource\RelationManagers;

use App\Models\Article;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ArticlesRelationManager extends RelationManager
{
    protected static string $relationship = 'articles';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(Article::class, 'slug', fn($record) => $record),
                        TiptapEditor::make('content')
                            ->required()
                            ->columnSpan([
                                'sm' => 2
                            ]),
                        Forms\Components\Select::make('user_id')
                            ->label('Author')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'title')
                            ->searchable()
                            ->required(),
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Published at'),
                        Forms\Components\SpatieTagsInput::make('tags'),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->columnSpan([
                                'sm' => 2
                            ]),
                    ])
                    ->columns([
                        'sm' => 2
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published at')
                    ->date()
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function (Column $column, $state): ?string {
                        if (blank($state)) {
                            return 'N/A';
                        }

                        return Carbon::parse($state)
                            ->setTimezone($column->getTimezone())
                            ->translatedFormat(config('tables.date_format'));
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created at')
                    ->date()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last updated at')
                    ->date()
                    ->sortable()
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
