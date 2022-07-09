<?php

namespace App\Filament\Resources\VaultResource\Pages;

use App\Filament\Resources\VaultResource;
use App\Models\Order;
use App\Models\Vault;
use DB;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVault extends EditRecord
{
    protected static string $resource = VaultResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('remove_reservation')
                ->label('Remove reservation')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->forceFill(['order_id' => null])->save();

                    $this->notify('success', 'Vault is now free to be reserved for another order');
                })
                ->hidden(fn() => $this->record->order_id === null),
            Actions\DeleteAction::make(),
        ];
    }
}
