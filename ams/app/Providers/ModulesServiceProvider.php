<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class ModulesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bind shared interfaces or cross-cutting concerns here
    }

    public function boot(): void
    {
        $modulesPath = base_path('modules');
        if (! is_dir($modulesPath)) {
            return;
        }

        foreach (File::directories($modulesPath) as $moduleDir) {
            $this->bootModule($moduleDir);
        }
    }

    protected function bootModule(string $moduleDir): void
    {
        $name = basename($moduleDir);

        // Register module-specific service provider if present
        $providerClass = "Modules\\{$name}\\Providers\\{$name}ServiceProvider";
        if (class_exists($providerClass)) {
            $this->app->register($providerClass);
        }

        // Routes
        $apiRoutes = $moduleDir.'/routes/api.php';
        if (file_exists($apiRoutes)) {
            Route::middleware('api')->prefix('api')->group($apiRoutes);
        }
        $webRoutes = $moduleDir.'/routes/web.php';
        if (file_exists($webRoutes)) {
            Route::middleware('web')->group($webRoutes);
        }

        // Migrations
        $migrationsPath = $moduleDir.'/database/migrations';
        if (config('modules.autoload_migrations') && is_dir($migrationsPath)) {
            $this->loadMigrationsFrom($migrationsPath);
        }

        // Views
        $viewsPath = $moduleDir.'/resources/views';
        if (is_dir($viewsPath)) {
            $this->loadViewsFrom($viewsPath, 'modules.'.strtolower($name));
        }

        // Translations
        $langPath = $moduleDir.'/resources/lang';
        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'modules.'.strtolower($name));
        }
    }
}

