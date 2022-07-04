<?php

namespace App\Filament\Pages;

use App\Jobs\CleanBackupsJob;
use App\Jobs\CreateBackupJob;
use Filament\Pages\Actions\Action;
use Filament\Pages\Page;

class Backups extends Page
{
    protected static ?string $slug = 'management/backups';

    protected static ?string $navigationIcon = 'heroicon-o-cloud-upload';

    protected static ?string $navigationGroup = 'Management';

    protected static ?int $navigationSort = 4;

    protected static string $view = 'filament.pages.backups';

    protected function getActions(): array
    {
        return [
            Action::make('Create Backup')
                ->label(__('filament-spatie-backup::backup.pages.backups.actions.create_backup'))
                ->action('openOptionModal'),

            Action::make('Clean Backups')
                ->requiresConfirmation()
                ->modalHeading('Clean Backups')
                ->modalSubheading('Are you sure you want to clean the old backups?')
                ->action('clean')
                ->color('secondary')
        ];
    }

    public function openOptionModal(): void
    {
        $this->dispatchBrowserEvent('open-modal', ['id' => 'backup-option']);
    }

    public function create(string $option = ''): void
    {
        dispatch(new CreateBackupJob($option))
            ->onQueue(config('filament-spatie-laravel-backup.queue'))
            ->afterResponse();

        $this->dispatchBrowserEvent('close-modal', ['id' => 'backup-option']);

        $this->notify('success', 'Backup is being created');
    }

    public function clean(): void
    {
        dispatch(new CleanBackupsJob())
            ->onQueue(config('filament-spatie-laravel-backup.queue'))
            ->afterResponse();

        $this->notify('success', 'Old backups are being cleaned');
    }
}
