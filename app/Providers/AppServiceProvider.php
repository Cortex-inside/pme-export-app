<?php

namespace PMEexport\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // Replaces removed infyomlabs/adminlte-templates package
        $this->loadViewsFrom(
            resource_path('views/vendor/adminlte-templates'),
            'adminlte-templates'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
