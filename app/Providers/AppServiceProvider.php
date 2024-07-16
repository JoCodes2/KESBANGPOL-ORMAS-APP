<?php

namespace App\Providers;

use App\Interfaces\OrmasInterfaces;
use App\Repositories\OrmasRepositories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrmasInterfaces::class, OrmasRepositories::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
