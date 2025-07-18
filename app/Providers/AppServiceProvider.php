<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use App\Http\Middleware\CheckUserRole;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    
public function boot(): void
{
    // Register middleware alias
    $this->app['router']->aliasMiddleware('check.role', \App\Http\Middleware\CheckUserRole::class);
}
    
}
