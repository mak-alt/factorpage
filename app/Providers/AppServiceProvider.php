<?php

namespace App\Providers;

// use Laravel\Cashier\Cashier;
use App\Services\MenuService;
use App\Services\TemplateService;
use Filament\Support\Colors\Color;
use App\Services\TenantPathGenerator;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentColor;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;

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
        $this->app->singleton(MenuService::class, function ($app) {
            return new MenuService();
        });

        $this->app->singleton(TemplateService::class, function ($app) {
            $menuService = $app->make(MenuService::class);
            return new TemplateService($menuService);
        });

        $this->app->bind(DefaultPathGenerator::class, TenantPathGenerator::class);

        // Cashier::calculateTaxes();
        FilamentColor::register([
            
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::hex('#5f5af6'),
            'success' => Color::Green,
            'warning' => Color::Amber,
        ]);
    }
}
