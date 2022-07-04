<?php

namespace App\Filament\Resources;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject;
use AlexJustesen\FilamentSpatieLaravelActivitylog\RelationManagers\ActivitiesRelationManager;
use AlexJustesen\FilamentSpatieLaravelActivitylog\ResourceFinder;
use App\Filament\Resources\AuditResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class AuditResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $slug = 'management/audits';

    protected static ?string $label = 'Audit';

    protected static ?string $navigationIcon = 'heroicon-o-table';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Management';

//    public static function form(Form $form): Form
//    {
//        return $form
//            ->schema([
//                Forms\Components\TextInput::make('causer_type')
//                    ->label('Causer type'),
//                Forms\Components\TextInput::make('causer_id')
//                    ->label('Causer id'),
//                Forms\Components\TextInput::make('subject_type')
//                    ->label('Subject type'),
//                Forms\Components\TextInput::make('subject_id')
//                    ->label('Subject id'),
//                Forms\Components\TextInput::make('description')
//                    ->label('Description'),
//                Forms\Components\KeyValue::make('properties.attributes')
//                    ->label('New data'),
//                Forms\Components\KeyValue::make('properties.old')
//                    ->label('Old data')
//            ]);
//    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('causer_type')
                            ->label('Causer type'),
                        Forms\Components\TextInput::make('causer_id')
                            ->label('Causer id'),
                        Forms\Components\TextInput::make('subject_type')
                            ->label('Subject type'),
                        Forms\Components\TextInput::make('subject_id')
                            ->label('Subject id'),
                        Forms\Components\TextInput::make('description')
                            ->label('Description')
                            ->columnSpan([
                                'sm' => 2
                            ]),
                        Forms\Components\KeyValue::make('properties.attributes')
                            ->label('New data'),
                        Forms\Components\KeyValue::make('properties.old')
                            ->label('Old data')
                    ])
                    ->columns([
                        'sm' => 2
                    ])
                    ->columnSpan([
                        'sm' => 2
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->label('Subject')
                    ->hidden(fn(Component $livewire) => $livewire instanceof ActivitiesRelationManager)
                    ->getStateUsing(function (Activity $record) {
                        if (!$record->subject || !$record->subject instanceof IsActivitySubject) {
                            return new HtmlString('&mdash;');
                        }

                        /** @var \AlexJustesen\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject */
                        $subject = $record->subject;

                        return $subject->getActivitySubjectDescription($record);
                    })
                    ->url(function (Activity $record) {
                        if (!$record->subject || !$record->subject instanceof IsActivitySubject) {
                            return;
                        }

                        /** @var class-string<\Filament\Resources\Resource> */
                        $resource = ResourceFinder::find($record->subject::class);

                        if (!$resource) {
                            return;
                        }

                        return $resource::getUrl('edit', ['record' => $record->subject]) ?? null;
                    }, shouldOpenInNewTab: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('has_subject')
                    ->label('Has subject')
                    ->query(fn(Builder $query) => $query->has('subject')),
            ])
            ->bulkActions([])
            ->defaultSort('created_at', 'DESC')
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->color('primary')
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'view' => Pages\ViewActivity::route('/{record}'),
        ];
    }
}
