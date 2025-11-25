<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! app()->environment('local')) {
            URL::forceScheme('https');
        }

        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            fn () => Blade::render('
                @vite("resources/css/custom-login.css")
            ')
        );

        FilamentView::registerRenderHook(
            'panels::body.end',
            fn () => Blade::render('
                @vite("resources/css/export-button.css")
            ')
        );
    }
}
