<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\URL;
use PMEexport\Providers\AppServiceProvider;
use Tests\TestCase;

class AppServiceProviderTest extends TestCase
{
    /**
     * URL::forceScheme('https') is called when the app environment is production.
     */
    public function testForceSchemeIsCalledInProduction(): void
    {
        config(['app.env' => 'production']);

        URL::shouldReceive('forceScheme')->once()->with('https');

        (new AppServiceProvider($this->app))->boot();
    }

    /**
     * URL::forceScheme('https') is not called when the app environment is not production.
     *
     * @dataProvider nonProductionEnvironments
     */
    public function testForceSchemeIsNotCalledWhenNotProduction(string $env): void
    {
        config(['app.env' => $env]);

        URL::shouldReceive('forceScheme')->never();

        (new AppServiceProvider($this->app))->boot();
    }

    public static function nonProductionEnvironments(): array
    {
        return [
            'local'   => ['local'],
            'staging' => ['staging'],
            'testing' => ['testing'],
        ];
    }
}
