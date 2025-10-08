<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        // Autorisatie: admin Gate op basis van user->role === 'admin'
        Gate::define('admin', function ($user) {
            return $user && method_exists($user, 'hasRole') ? $user->hasRole('admin') : false;
        });
    }
}
