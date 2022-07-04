<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\ScheduleCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->setupHealthChecks();

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                'News',
                'Store',
                'Management',
                'Administration'
            ]);

            Filament::registerRenderHook(
                'head.end',
                fn() => app(Vite::class)(['resources/css/admin.css'])
            );

            Filament::pushMeta([
                new HtmlString('<meta name="theme-color" content="#292E38">'),
                new HtmlString('<link rel="shortcut icon" href="' . asset('images/favicon.ico') . '" type="image/x-icon">'),
                new HtmlString('<link rel="icon" href="' . asset('images/favicon.ico') . '" type="image/x-icon">')
            ]);
        });
    }

    private function setupHealthChecks(): void
    {
        $checks = [
            UsedDiskSpaceCheck::new(),
            DatabaseCheck::new(),
            CacheCheck::new(),
            ScheduleCheck::new()
                ->heartbeatMaxAgeInMinutes(2),
            DebugModeCheck::new(),
            EnvironmentCheck::new()
        ];

        if (function_exists('sys_getloadavg')) {
            $checks[] = CpuLoadCheck::new()
                ->failWhenLoadIsHigherInTheLast5Minutes(2.0)
                ->failWhenLoadIsHigherInTheLast15Minutes(1.5);
        }

        Health::checks($checks);
    }
}
