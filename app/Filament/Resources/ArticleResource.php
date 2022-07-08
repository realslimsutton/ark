<?php

namespace App\Filament\Resources;

use App\Filament\RelationManagers\AuditsRelationManager;
use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use MartinRo\FilamentCharcountField\Components\CharcountedTextInput;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $slug = 'news/articles';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'News';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        CharcountedTextInput::make('title')
                            ->required()
                            ->reactive()
                            ->maxLength(255)
                            ->maxCharacters(255)
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                        CharcountedTextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->maxCharacters(255)
                            ->unique(Article::class, 'slug', fn($record) => $record),
                        TiptapEditor::make('summary')
                            ->required()
                            ->columnSpan([
                                'sm' => 2
                            ]),
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
                            ->label('Published at')
                            ->nullable()
                            ->withoutSeconds()
                            ->dehydrateStateUsing(function ($state, $record) {
                                if (empty($state)) {
                                    return null;
                                }

                                $now = now();

                                $parsedState = Carbon::parse($state);

                                if ($record->published_at !== null
                                    && $parsedState->equalTo($record->published_at)) {
                                    return $parsedState;
                                }

                                if ($parsedState->isBefore($now)) {
                                    return $now;
                                }

                                return $parsedState;
                            }),
                        Forms\Components\SpatieTagsInput::make('tags')
                    ])
                    ->columns([
                        'sm' => 2
                    ])
                    ->columnSpan([
                        'sm' => 2
                    ]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->collection('thumbnail'),
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn(?Article $record): string => $record?->created_at?->diffForHumans() ?? '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last updated at')
                            ->content(fn(?Article $record): string => $record?->updated_at?->diffForHumans() ?? '-')
                    ])
                    ->columnSpan(1)
            ])
            ->columns([
                'sm' => 3,
                'lg' => null
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
                Tables\Actions\DeleteAction::make()
                    ->modalHeading('Delete Article')
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AuditsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
