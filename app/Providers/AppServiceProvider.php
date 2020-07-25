<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Gate::define('super_admin', function($user){
            return $user->peran->nama == 'Super Admin';
        });

        Gate::define('hse', function($user){
            return $user->peran->nama == 'HSE';
        });

        Gate::define('admin_kontraktor', function($user){
            return $user->peran->nama == 'Admin Kontraktor';
        });

        Gate::define('manager_kontraktor', function($user){
            return $user->peran->nama == 'Manager Kontraktor';
        });

        Gate::define('kontraktor', function($user){
            if ($user->peran->nama == 'Manager Kontraktor' || $user->peran->nama == 'Admin Kontraktor') {
                return true;
            }
        });

        Gate::define('hse-manager_kontraktor', function($user){
            if ($user->peran->nama == 'Manager Kontraktor' || $user->peran->nama == 'HSE') {
                return true;
            }
        });

        Gate::define('no_admin', function($user){
            if ($user->peran->nama == 'Admin Kontraktor' || $user->peran->nama == 'Manager Kontraktor' || $user->peran->nama == 'HSE') {
                return true;
            }
        });
    }
}
