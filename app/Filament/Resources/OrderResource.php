<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Vault;
use DB;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $slug = 'store/orders';

    protected static ?string $navigationGroup = 'Store';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Select::make('user')
                            ->relationship('user', 'name'),
                        Forms\Components\Placeholder::make('completed')
                            ->label('Completed')
                            ->content(fn(?Order $record): string => $record !== null && $record->completed ? 'Completed' : 'Not completed'),
                        Forms\Components\Select::make('completed_by_user')
                            ->relationship('completed_by_user', 'name')
                            ->hidden(fn($record) => $record === null || !$record->completed),
                        Forms\Components\DateTimePicker::make('completed_at')
                            ->hidden(fn($record) => $record === null || !$record->completed),
                    ])
                    ->columns([
                        'sm' => 2
                    ])
                    ->columnSpan([
                        'sm' => 2
                    ]),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('vault')
                            ->label('Vault')
                            ->content(fn(?Order $record): string => $record?->vault?->title ?? '-'),
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn(?Order $record): string => $record?->created_at?->diffForHumans() ?? '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last updated at')
                            ->content(fn(?Order $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                    ])
                    ->columnSpan(1),
                Forms\Components\View::make('filament.resources.order-resource.products')
                    ->columnSpan([
                        'sm' => 3
                    ])
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
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('completed')
                    ->sortable(),
                Tables\Columns\TextColumn::make('completed_by_user')
                    ->label('Completed by')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn($state) => $state?->name ?? '-'),
                Tables\Columns\TextColumn::make('completed_at')
                    ->date()
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(static function (Column $column, $state): ?string {
                        $format ??= config('tables.date_format');

                        if (blank($state)) {
                            return '-';
                        }

                        return Carbon::parse($state)
                            ->setTimezone($column->getTimezone())
                            ->translatedFormat($format);
                    }),
                Tables\Columns\TextColumn::make('vault')
                    ->label('Vault')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn($state) => $state?->title ?? '-')
                    ->url(function ($record) {
                        if ($record === null || $record->vault === null) {
                            return null;
                        }

                        return route('filament.resources.store/vaults.edit', [$record->vault->id]);
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('assign_vault')
                    ->label('Assign vault')
                    ->requiresConfirmation()
                    ->form([
                        Checkbox::make('auto_assign_vault')
                            ->label('Automatically assign an available vault')
                            ->default(true),
                        Forms\Components\Select::make('vault_id')
                            ->label('Vault')
                            ->searchable()
                            ->getSearchResultsUsing(
                                fn(string $search) => Vault::query()
                                    ->where('title', 'like', "%{$search}%")
                                    ->whereRaw(DB::raw('(order_id IS NULL OR (expires_at IS NULL or expires_at <= NOW()))'))
                                    ->limit(50)
                                    ->pluck('title', 'id')
                            )
                    ])
                    ->action(function ($record, array $data) {
                        $record->forceFill([
                            'completed_by' => null,
                            'completed_at' => null
                        ])->save();

                        if ($data['vault_id'] !== null) {
                            $vault = Vault::find($data['vault_id']);

                            if ($vault !== null) {
                                $record->vault()->save($vault);

                                $vault
                                    ->forceFill(['expires_at' => now()->addDays(7)])
                                    ->save();
                            }
                        } else {
                            $vault = Vault::query()
                                ->whereRaw(DB::raw('(order_id IS NULL OR (expires_at IS NULL or expires_at <= NOW()))'))
                                ->first();

                            if ($vault !== null) {
                                $record->vault()->save($vault);

                                $vault
                                    ->forceFill(['expires_at' => now()->addDays(7)])
                                    ->save();
                            }
                        }

                        if (!isset($vault)) {
                            Filament::notify('warning', 'No vault is currently available');
                        } else {
                            Filament::notify('success', 'Order has been assigned vault ' . $vault->title);
                        }
                    })
                    ->hidden(fn($record) => $record->completed || $record->vault !== null),
                Tables\Actions\Action::make('unassign_vault')
                    ->label('Unassign vault')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        if ($record->vault === null) {
                            return;
                        }

                        $title = $record->vault->title;

                        $record->vault->forceFill([
                            'order_id' => null
                        ])->save();

                        Filament::notify('success', 'Order has been unassigned from vault ' . $title);
                    })
                    ->hidden(fn($record) => $record->completed || $record->vault === null),
                Tables\Actions\Action::make('complete')
                    ->label('Mark as completed')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->forceFill([
                            'completed_by' => auth()->id(),
                            'completed_at' => now()
                        ])->save();

                        if ($record->vault !== null) {
                            $record->vault->forceFill([
                                'order_id' => null
                            ])->save();
                        }

                        $message = $record->vault === null
                            ? 'Order has been marked as completed'
                            : 'Order has been marked as completed, '
                            . 'and vault ' . $record->vault->title . ' has been released';

                        Filament::notify('success', $message);
                    })
                    ->hidden(fn($record) => $record->completed),

                Tables\Actions\Action::make('incomplete')
                    ->label('Mark as incomplete')
                    ->requiresConfirmation()
                    ->form([
                        Checkbox::make('auto_assign_vault')
                            ->label('Automatically assign an available vault')
                            ->default(true),
                        Forms\Components\Select::make('vault_id')
                            ->label('Vault')
                            ->searchable()
                            ->getSearchResultsUsing(
                                fn(string $search) => Vault::query()
                                    ->where('title', 'like', "%{$search}%")
                                    ->whereRaw(DB::raw('(order_id IS NULL OR (expires_at IS NULL or expires_at <= NOW()))'))
                                    ->limit(50)
                                    ->pluck('title', 'id')
                            )
                    ])
                    ->action(function ($record, array $data) {
                        $record->forceFill([
                            'completed_by' => null,
                            'completed_at' => null
                        ])->save();

                        if ($data['vault_id'] !== null) {
                            $vault = Vault::find($data['vault_id']);

                            if ($vault !== null) {
                                $record->vault()->save($vault);

                                $vault
                                    ->forceFill(['expires_at' => now()->addDays(7)])
                                    ->save();
                            }
                        } else if ($data['auto_assign_vault']) {
                            $vault = Vault::query()
                                ->whereRaw(DB::raw('(order_id IS NULL OR (expires_at IS NULL or expires_at <= NOW()))'))
                                ->first();

                            if ($vault !== null) {
                                $record->vault()->save($vault);

                                $vault
                                    ->forceFill(['expires_at' => now()->addDays(7)])
                                    ->save();
                            }
                        }

                        $message = $record->vault === null
                            ? 'Order has been marked as incomplete'
                            : 'Order has been marked as incomplete, '
                            . 'and has been assigned vault ' . $record->vault->title;

                        Filament::notify('success', $message);
                    })
                    ->hidden(fn($record) => !$record->completed)
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
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with([
                'products',
                'products.fields'
            ]);
    }
}
