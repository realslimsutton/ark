<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Vault;
use DB;
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('assign_vault')
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
                ->action(function (array $data) {
                    $record = $this->record;

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
                ->hidden(fn() => $this->record->completed || $this->record->vault !== null),
            Action::make('unassign_vault')
                ->label('Unassign vault')
                ->requiresConfirmation()
                ->action(function () {
                    $record = $this->record;

                    if ($record->vault === null) {
                        return;
                    }

                    $title = $record->vault->title;

                    $record->vault->forceFill([
                        'order_id' => null
                    ])->save();

                    Filament::notify('success', 'Order has been unassigned from vault ' . $title);
                })
                ->hidden(fn() => $this->record->completed || $this->record->vault === null),
            Action::make('complete')
                ->label('Mark as completed')
                ->requiresConfirmation()
                ->action(function () {
                    $record = $this->record;

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

                    $this->notify('success', $message);
                })
                ->hidden(fn() => $this->record->completed),

            Action::make('incomplete')
                ->label('Mark as incomplete')
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
                ->action(function (array $data) {
                    $record = $this->record;

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

                    $message = !isset($vault)
                        ? 'Order has been marked as incomplete'
                        : 'Order has been marked as incomplete, '
                        . 'and has been assigned vault ' . $vault->title;

                    $this->notify('success', $message);
                })
                ->hidden(fn() => !$this->record->completed)
        ];
    }
}
