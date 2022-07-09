<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductFieldResource\Pages;
use App\Filament\Resources\ProductFieldResource\RelationManagers;
use App\Models\ProductField;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use MartinRo\FilamentCharcountField\Components\CharcountedTextInput;

class ProductFieldResource extends Resource
{
    protected static ?string $model = ProductField::class;

    protected static ?string $slug = 'store/fields';

    protected static ?string $label = 'Fields';

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    protected static ?string $navigationGroup = 'Store';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        CharcountedTextInput::make('name')
                            ->required()
                            ->maxCharacters(255)
                            ->maxLength(255),
                        Forms\Components\Checkbox::make('in_table')
                            ->label('Show in the table')
                            ->helperText('The field will appear at the bottom of the product page in a table')
                    ])
                    ->columns([
                        'sm' => 2
                    ])
                    ->columnSpan([
                        'sm' => 2
                    ]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn(?ProductField $record): string => $record?->created_at?->diffForHumans() ?? '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last updated at')
                            ->content(fn(?ProductField $record): string => $record?->updated_at?->diffForHumans() ?? '-')
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

    public static function getRelations(): array
    {
        return [
            RelationManagers\OptionsRelationManager::class,
            RelationManagers\ProductsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductFields::route('/'),
            'create' => Pages\CreateProductField::route('/create'),
            'edit' => Pages\EditProductField::route('/{record}/edit'),
        ];
    }
}
