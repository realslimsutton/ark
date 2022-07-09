<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Vault;
use DB;
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class IncompleteOrders extends BaseWidget
{
    protected int|string|array $columnSpan = 2;

    protected function getTableQuery(): Builder
    {
        return Order::query()
            ->whereNull('completed_at');
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'created_at';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'asc';
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')
                ->sortable()
                ->searchable(),
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
                ->dateTime()
                ->sortable()
                ->searchable()
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('assign_vault')
                ->label('Assign vault')
                ->requiresConfirmation()
                ->form([
                    Checkbox::make('auto_assign_vault')
                        ->label('Automatically assign an available vault')
                        ->default(true),
                    Select::make('vault_id')
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
                ->hidden(fn($record) => $record->completed)
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return true;
    }
}
