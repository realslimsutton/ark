<?php

namespace App\Filament\Resources\VaultResource\Pages;

use App\Filament\Resources\VaultResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVaults extends ListRecords
{
    protected static string $resource = VaultResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
