<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use App\Filament\Actions\AttachButton;
use App\Forms\Components\CheckboxListChecked;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Arr;

class FieldsRelationManager extends RelationManager
{
    protected static string $relationship = 'fields';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\CheckboxList::make('pivot.config')
                    ->disableLabel()
                    ->options(function ($record) {
                        if ($record === null) {
                            return [];
                        }

                        return $record->options
                            ->mapWithKeys(fn($r) => [
                                $r['id'] => $r['name']
                            ])
                            ->all();
                    })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->button()
                    ->url(route('filament.resources.store/fields.create'))
                    ->openUrlInNewTab(),
                AttachButton::make()
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->name('configure')
                    ->label('Configure')
                    ->action(function (Tables\Actions\EditAction $action): void {
                        $action->process(function (array $data, Model $record) use ($action) {
                            $relationship = $action->getRelationship();

                            if ($relationship instanceof BelongsToMany) {
                                $pivotColumns = $relationship->getPivotColumns();

                                $pivotData = Arr::only($data['pivot'] ?? [], $pivotColumns);

                                if (count($pivotColumns)) {
                                    $record->{$relationship->getPivotAccessor()}->update($pivotData);
                                }

                                $data = Arr::except($data, 'pivot');
                            }

                            $record->update($data);
                        });

                        $action->success();
                    }),
                Tables\Actions\Action::make('edit')
                    ->link()
                    ->url(fn($record) => route('filament.resources.store/fields.edit', [$record->id]))
                    ->openUrlInNewTab(),
                Tables\Actions\DetachAction::make()
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make()
            ]);
    }
}
