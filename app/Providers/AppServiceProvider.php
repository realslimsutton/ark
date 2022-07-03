<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Filament::serving(function () {
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
}
