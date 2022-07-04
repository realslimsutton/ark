<?php

namespace App\Filament\Resources\AuditResource\Pages;

use App\Filament\Resources\AuditResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;

class ListActivities extends ListRecords
{
    protected static string $resource = AuditResource::class;
}
