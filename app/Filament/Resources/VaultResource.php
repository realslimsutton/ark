<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaultResource\Pages;
use App\Filament\Resources\VaultResource\RelationManagers;
use App\Models\Vault;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use MartinRo\FilamentCharcountField\Components\CharcountedTextInput;

class VaultResource extends Resource
{
    protected static ?string $model = Vault::class;

    protected static ?string $slug = 'store/vaults';

    protected static ?string $navigationGroup = 'Store';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-archive';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        CharcountedTextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->maxCharacters(255)
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
                            ->content(fn(?Vault $record): string => $record?->created_at?->diffForHumans() ?? '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last updated at')
                            ->content(fn(?Vault $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
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
                Tables\Columns\BooleanColumn::make('available')
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->hidden(),
                Tables\Columns\TextColumn::make('order.user')
                    ->label('Reserved for')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn($state) => $state?->name ?? '-')
                    ->url(function ($record) {
                        if ($record === null || $record->order === null) {
                            return null;
                        }

                        return route('filament.resources.store/orders.view', [$record->order->id]);
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->date()
                    ->sortable()
                    ->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVaults::route('/'),
            'create' => Pages\CreateVault::route('/create'),
            'edit' => Pages\EditVault::route('/{record}/edit'),
        ];
    }
}
