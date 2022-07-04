<?php

namespace App\Filament\Resources;

use App\Filament\RelationManagers\AuditsRelationManager;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Store';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(Product::class, 'slug', fn($record) => $record),
                        Forms\Components\MarkdownEditor::make('description')
                            ->required()
                            ->columnSpan([
                                'sm' => 2
                            ]),
                        Forms\Components\TextInput::make('price')
                            ->numeric()
                            ->required()
                            ->minValue(0),
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'title')
                            ->searchable()
                            ->required(),
                        Forms\Components\SpatieTagsInput::make('tags'),
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
                        Forms\Components\DateTimePicker::make('expires_at')
                            ->label('Expires at')
                            ->nullable()
                            ->withoutSeconds()
                            ->dehydrateStateUsing(function ($state, $record) {
                                if (empty($state)) {
                                    return null;
                                }

                                $now = now();

                                $parsedState = Carbon::parse($state);

                                if ($record->expires_at !== null
                                    && $parsedState->equalTo($record->expires_at)) {
                                    return $parsedState;
                                }

                                if ($parsedState->isBefore($now)) {
                                    return $now;
                                }

                                return $parsedState;
                            }),
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
                            ->content(fn(?Product $record): string => $record?->created_at?->diffForHumans() ?? '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last updated at')
                            ->content(fn(?Product $record): string => $record?->updated_at?->diffForHumans() ?? '-')
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
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published at')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('expires_at')
                    ->label('Expires at')
                    ->dateTime()
                    ->sortable()
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading('Delete Product')
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\FieldsRelationManager::class,
            AuditsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
