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

        Gate::define('sub_kontraktor', function($user){
            return $user->peran->nama == 'Sub Kontraktor';
        });

        Gate::define('kontraktor', function($user){
            return $user->peran->nama == 'Kontraktor';
        });
    }
}
