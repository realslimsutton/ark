<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

class CreateBackupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    protected string $option;

    public function __construct(string $option = '')
    {
        $this->option = $option;
    }

    public function handle()
    {
        $option = match ($this->option) {
            'only-db' => ' --only-db',
            '--only-files' => ' --only-files',
            default => '',
        };

        Artisan::call('backup:run' . $option);
    }
}
