<?php

namespace PMEexport\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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

        Passport::tokensExpireIn(Carbon::now()->addDays(15));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        Blade::if('shield', function ($permission) {
            return auth()->check() && auth()->user()->can($permission);
        });

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
