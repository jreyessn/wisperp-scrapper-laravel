<?php

namespace Wisperp\ScrapperRouters;

use Illuminate\Support\ServiceProvider;

class WsrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerMigrations();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerFacades();
        $this->registerConfig();
    }

    /**
     * Register the package migrations
     *
     * @return void
     */
    protected function registerMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes(
            [
                __DIR__ . '/database/migrations' => base_path('database/migrations'),
            ],
            'wsr-migrations'
        );
    }

    /**
     * Registrar configuraciones personalizadas
     */
    protected function registerConfig(): void {
        $this->mergeConfigFrom(
            __DIR__.'/config/wsr.php', 'wsr'
        );

        $this->publishes([
            __DIR__.'/config/wsr.php' => config_path('wsr.php'),
        ]);
    }

    /**
     * Register Facades
     */
    protected function registerFacades() : void {
        $classes = [
            'wsr.router' => \Wisperp\ScrapperRouters\Services\RouterService::class,
            'wsr.wan'    => \Wisperp\ScrapperRouters\Services\WanService::class,
            'wsr.lan'    => \Wisperp\ScrapperRouters\Services\LanService::class,
            'wsr.admin'  => \Wisperp\ScrapperRouters\Services\AdminService::class,
            'wsr.devices'=> \Wisperp\ScrapperRouters\Services\DevicesService::class,
            'wsr.dhcp'   => \Wisperp\ScrapperRouters\Services\DhcpService::class,
            'wsr.iptv'   => \Wisperp\ScrapperRouters\Services\IptvService::class,
            'wsr.wifi'   => \Wisperp\ScrapperRouters\Services\WifiService::class,
        ];
    
        foreach ($classes as $alias => $class) {
            $this->app->singleton($alias, function () use ($class) {
                return new $class;
            });
        }
    }

}