<?php

namespace App\Filament\Pages;

use Carbon\Carbon;
use Filament\Pages\Actions\Action;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Artisan;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Spatie\Health\ResultStores\EloquentHealthResultStore;

class SystemHealth extends Page
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationGroup = 'Management';

    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament-spatie-health::pages.health-check-results';

    protected function getActions(): array
    {
        return [
            Action::make(__('filament-spatie-health::health.pages.health_check_results.buttons.refresh'))
                ->action('refresh'),
        ];
    }

    protected function getViewData(): array
    {
        $checkResults = (new EloquentHealthResultStore())->latestResults();

        return [
            'lastRanAt' => new Carbon($checkResults?->finishedAt),
            'checkResults' => $checkResults,
        ];
    }

    public function refresh(): void
    {
        Artisan::call(RunHealthChecksCommand::class);

        $this->emitSelf('refreshComponent');
    }
}
