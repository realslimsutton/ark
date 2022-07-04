<?php

namespace App\Filament\RelationManagers;

use App\Filament\Resources\AuditResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class AuditsRelationManager extends RelationManager
{
    protected static string $relationship = 'activities';

    protected static ?string $recordTitleAttribute = 'description';

    protected static ?string $title = 'Audit';

    public static function table(Table $table): Table
    {
        return AuditResource::table($table)
            ->bulkActions([])
            ->actions([
                Tables\Actions\Action::make('View')
                    ->link()
                    ->url(fn($record) => AuditResource::getUrl('view', ['record' => $record]), shouldOpenInNewTab: true),
            ]);
    }

    protected function canCreate(): bool
    {
        return false;
    }

    protected function canEdit(Model $record): bool
    {
        return false;
    }

    protected function canDelete(Model $record): bool
    {
        return false;
    }
}
