<?php

namespace App\Filament\Actions;

use App\Models\ProductField;
use App\Models\ProductFieldOption;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\AttachAction;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class AttachButton extends AttachAction
{
    public $fieldOptions = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->form(function () {
            return [
                $this->getRecordSelect()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $field = ProductField::find($state);
                        if ($field === null) {
                            return;
                        }

                        return $this->fieldOptions = $field->options;
                    }),

                CheckboxList::make('config')
                    ->label('Options')
                    ->options(function ($record) {
                        if ($this->fieldOptions === null) {
                            return [];
                        }

                        $records = collect($this->fieldOptions)->toArray();

                        return collect($records)
                            ->mapWithKeys(fn($r) => [
                                $r['id'] => $r['name']
                            ])
                            ->all();
                    })
                    ->getOptionLabelFromRecordUsing(fn(ProductFieldOption $record) => $record->name)
            ];
        });

        $this->action(function (array $arguments, ComponentContainer $form): void {
            $this->process(function (array $data) {
                /** @var BelongsToMany $relationship */
                $relationship = $this->getRelationship();

                $record = $relationship->getRelated()->query()->find($data['recordId']);

                $relationship->attach(
                    $record,
                    Arr::only($data, $relationship->getPivotColumns()),
                );
            });

            if ($arguments['another'] ?? false) {
                $this->callAfter();
                $this->sendSuccessNotification();

                $form->fill();

                $this->hold();

                return;
            }

            $this->success();
        });
    }
}
