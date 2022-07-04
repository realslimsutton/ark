<?php

namespace App\Filament\Pages;

use App\Jobs\CleanBackupsJob;
use App\Jobs\CreateBackupJob;
use Filament\Pages\Actions\Action;
use Filament\Pages\Page;

class Backups extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.backups';

    protected function getHeading(): string
    {
        return __('filament-spatie-backup::backup.pages.backups.heading');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('filament-spatie-backup::backup.pages.backups.navigation.group');
    }

    protected static function getNavigationLabel(): string
    {
        return __('filament-spatie-backup::backup.pages.backups.navigation.label');
    }

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
