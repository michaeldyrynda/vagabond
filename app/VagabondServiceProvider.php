<?php

namespace App;

use Illuminate\Support\ServiceProvider;

abstract class VagabondServiceProvider extends ServiceProvider
{
    protected $connectionName;

    public function boot()
    {
        if (is_dir($migrationPath = $this->migrationPath())) {
            $this->loadMigrationsFrom($migrationPath);
        }
    }

    public function register()
    {
        if (is_file($configPath = $this->configPath())) {
            $this->mergeConfigFrom($configPath, $this->configKey());
        }
    }

    protected function migrationPath()
    {
        return dirname(__FILE__)."/../../database/migrations/{$this->connectionName}";
    }

    protected function configPath()
    {
        return dirname(__FILE__)."/../../config/{$this->connectionName}.php";
    }

    protected function configKey($prefix = 'database.connections')
    {
        return "{$prefix}.{$this->connectionName}";
    }
}
