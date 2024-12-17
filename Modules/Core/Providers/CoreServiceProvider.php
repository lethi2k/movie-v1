<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Models\Settings\Setting;
use Modules\Core\Repositories\Interfaces\LinksRepositoryInterface;
use Modules\Core\Repositories\Interfaces\MenusRepositoryInterface;
use Modules\Core\Repositories\Interfaces\PagesRepositoryInterface;
use Modules\Core\Repositories\Interfaces\SettingRepositoryInterface;
use Modules\Core\Repositories\Interfaces\StoreRepositoryInterface;
use Modules\Core\Repositories\Interfaces\TaxRepositoryInterface;
use Modules\Core\Repositories\LinksRepository;
use Modules\Core\Repositories\MenusRepository;
use Modules\Core\Repositories\PagesRepository;
use Modules\Core\Repositories\SettingRepository;
use Modules\Core\Repositories\StoreRepository;
use Modules\Core\Repositories\TaxRepository;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $moduleName = 'Core';

    /**
     * @var string
     */
    protected $moduleNameLower = 'core';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/../Http/helpers.php';
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StoreRepositoryInterface::class, StoreRepository::class);
        $this->app->bind(PagesRepositoryInterface::class, PagesRepository::class);
        $this->app->bind(MenusRepositoryInterface::class, MenusRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(LinksRepositoryInterface::class, LinksRepository::class);
        $this->app->bind(TaxRepositoryInterface::class, TaxRepository::class);

        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'),
            $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath,
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }

        return $paths;
    }
}
