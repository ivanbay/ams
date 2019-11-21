<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);

        Blade::directive('role', function ($role) {
            $role = str_replace(['(', ')', ' ', "'"], "", $role);
            $hasRole = Auth::user()->hasRole($role) || Auth::user()->hasRole(ucwords($role));
            return "<?php if({$hasRole}) {?>";
        });

        Blade::directive('endrole', function() {
            return "<?php } ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
