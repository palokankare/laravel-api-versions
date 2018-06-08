<?php

namespace Klopal\ApiVersions;

use Illuminate\Support\ServiceProvider;

class ApiVersionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/api-versions.php' => config_path('api-versions.php'),
            ], 'config');
        }

        $this->app->singleton(ApiVersionsInterface::class, config('api-versions.api_versions'));
        $this->app->singleton(UsedApiVersionInterface::class, config('api-versions.used_version'));
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/api-versions.php', 'api-versions');
    }
}
