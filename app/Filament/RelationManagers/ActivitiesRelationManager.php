<?php

namespace App\Filament\RelationManagers;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class ActivitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'actions';

    protected static ?string $recordTitleAttribute = 'description';

    protected static ?string $title = 'Activity';

    public static function table(Table $table): Table
    {
        return ActivityResource::table($table)
            ->bulkActions([])
            ->appendActions([
                Tables\Actions\Action::make('View')
                    ->link()
                    ->url(fn($record) => ActivityResource::getUrl('view', ['record' => $record]), shouldOpenInNewTab: true),
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
