<?php

namespace App\Filament\Resources;

use App\Filament\RelationManagers\ActivitiesRelationManager;
use App\Filament\RelationManagers\AuditsRelationManager;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Phpsa\FilamentPasswordReveal\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'management/users';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email address')
                            ->required()
                            ->email()
                            ->unique(User::class, 'email', fn($record) => $record),
                        Password::make('password')
                            ->dehydrateStateUsing(fn($state) => Hash::make($state))
                            ->dehydrated(fn($state) => filled($state))
                            ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord),
                        Password::make('password_confirmation'),
                        Forms\Components\TextInput::make('balance')
                            ->integer()
                            ->required()
                            ->minValue(0)
                    ])
                    ->columns([
                        'sm' => 2
                    ])
                    ->columnSpan([
                        'sm' => 2
                    ]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('discord')
                            ->label('Connected to Discord')
                            ->hiddenOn(Pages\CreateUser::class)
                            ->content(fn(User $record): string => $record->discord !== null ? 'Yes' : 'No'),
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn(?User $record): string => $record?->created_at?->diffForHumans() ?? '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last updated at')
                            ->content(fn(?User $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
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
                Tables\Columns\TextColumn::make('email')
                    ->label('Email address')
                    ->sortable()
                    ->searchable(),
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

    public static function getRelations(): array
    {
        return [
            RelationManagers\ArticlesRelationManager::class,
            ActivitiesRelationManager::class,
            AuditsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
