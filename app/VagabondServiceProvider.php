<?php

namespace App;

use Illuminate\Support\ServiceProvider;

class VagabondServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(dirname(__FILE__).'/../database/migrations');
    }
}
