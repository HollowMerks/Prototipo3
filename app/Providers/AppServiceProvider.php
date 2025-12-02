<?php

namespace App\Providers;

use App\Models\UsuariosCampusMarket;
use App\Policies\UsuariosCampusMarketPolicy;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        UsuariosCampusMarket::class => UsuariosCampusMarketPolicy::class,
    ];

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
        // Registrar policies
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }

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
